<template>
    <div class="p-8">
        <h1 class="text-2xl font-bold mb-4">Tambah Berita</h1>

        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <label class="block font-medium">Judul</label>
                <input
                    v-model="form.judul"
                    type="text"
                    class="border rounded w-full p-2"
                />
                <p v-if="errors.judul" class="text-red-500 text-sm">
                    {{ errors.judul }}
                </p>
            </div>

            <div>
                <label class="block font-medium">Isi</label>
                <textarea
                    v-model="form.isi"
                    class="border rounded w-full p-2"
                ></textarea>
                <p v-if="errors.isi" class="text-red-500 text-sm">
                    {{ errors.isi }}
                </p>
            </div>

            <div>
                <label class="block font-medium">Gambar (opsional)</label>
                <input
                    v-model="form.gambar"
                    type="text"
                    class="border rounded w-full p-2"
                    placeholder="URL gambar"
                />
            </div>

            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
                :disabled="processing"
            >
                Simpan
            </button>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    judul: "",
    isi: "",
    gambar: "",
});

const submit = () => {
    form.post("/berita");
};

const errors = form.errors;
const processing = form.processing;
</script>
