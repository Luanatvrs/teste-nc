import api from "@/services";

export async function findAll(){
    try {
        const { data } = await api.get("/comentarios");
        return data;
    } catch (error) {
        throw error;
    }
}

export async function store(form){
    try {
        const { data } = await api.post("/comentarios", form);
        return data;
    } catch (error) {
        throw error;
    }
}

export async function edit(form, id){
    try {
        const { data } = await api.put(`/comentarios/${id}`, form);
        return data;
    } catch (error) {
        throw error;
    }
}

export async function destroy(id){
    try {
        const { data } = await api.delete(`/comentarios/${id}`);
        return data;
    } catch (error) {
        throw error;
    }
}