<template>
  <div class="bg-white m-3 rounded-md p-3 space-y-3">
    <div class="flex gap-2">
      <div class="h-6 w-1 rounded-md bg-blue-500"></div>
      <p class="font-semibold">Comentários</p>
    </div>
    <div>
      <form @submit.prevent="submit" class="grid grid-cols-12 gap-2">
        <div class="col-span-6">
          <label class="text-gray-700 font-medium">Nome</label>
          <input
            v-model="form.name"
            type="text"
            class="w-full border border-gray-200 rounded-md"
          />
        </div>
        <div class="col-span-4">
          <label class="text-gray-700 font-medium">Mensagem</label>
          <input
            v-model="form.message"
            type="text"
            class="w-full border border-gray-200 rounded-md"
          />
        </div>
        <div class="col-span-2 flex items-end">
          <button
            type="submit"
            class="bg-blue-500 w-full hover:bg-blue-600 cursor-pointer rounded-md p-[2px] text-white font-semibold"
          >
            Salvar
          </button>
        </div>
      </form>
    </div>
    <table class="w-full text-left">
      <thead>
        <tr
          class="bg-blue-500 text-white border border-gray-200 border-collapse"
        >
          <th class="py-2 px-3 font-medium">Nome</th>
          <th class="py-2 px-3 font-medium">Mensagem</th>
          <th class="py-2 px-3 font-medium">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="dado in dados"
          class="border border-gray-200 border-collapse"
        >
          <td class="py-2 px-3 text-gray-700 font-normal">{{ dado.name }}</td>
          <td class="py-2 px-3 text-gray-700 font-normal">
            {{ dado.message }}
          </td>
          <td class="py-2 px-3 text-gray-700 font-normal flex gap-1">
            <button
              @click="editar(dado)"
              class="bg-blue-500 hover:bg-blue-700 cursor-pointer transition duration-500 rounded-md p-1 text-white font-medium"
            >
              Editar
            </button>
            <button
              class="bg-red-600 hover:bg-red-700 cursor-pointer transition duration-500 rounded-md p-1 text-white font-medium"
              @click="excluir(dado.id)"
            >
              Excluir
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { findAll, store, edit, destroy } from "@/services/comentarios.js";

export default {
  data() {
    return {
      dados: [],
      form: this.initForm(),
    };
  },

  created() {
    this.getItems();
  },

  methods: {
    editar(dado) {
      this.form = dado;
    },
    async excluir(id) {
      try {
        const { message } = await destroy(id);
        this.$toast.success(message, {
          position: "top-right",
        });
        this.dados = this.dados.filter((d) => d.id != id);
      } catch (error) {
        console(error);
      }
    },
    async submit() {
      try {
        let message = "";
        let result = "";

        if (this.form.id) {
          ({ message, result } = await edit(this.form, this.form.id));
          const index = this.dados.findIndex((d) => d.id == result.id);
          if (index >= 0) {
            this.dados[index] = result;
          }
        } else {
          ({ message, result } = await store(this.form));
          this.dados.unshift(result);
        }
        this.$toast.success(message, {
          position: "top-right",
        });
        this.form = this.initForm();
      } catch (error) {
        console(error);
      }
    },
    async getItems() {
      try {
        this.dados = await findAll();
      } catch (error) {
        console(error);
      }
    },
    initForm() {
      return {
        name: null,
        message: null,
      };
    },
  },
};
</script>
