<template>
    <div class="p-8">
        <h1 class="text-2xl font-bold mb-4">Kelola Berita</h1>

        <Link
            href="/berita/create"
            class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
        >
            + Tambah Berita
        </Link>

        <div v-if="berita.length === 0" class="text-gray-500">
            Belum ada berita.
        </div>

        <div v-else class="space-y-4">
            <div
                v-for="item in berita"
                :key="item.id"
                class="border p-4 rounded-md shadow-sm flex justify-between items-center"
            >
                <div>
                    <h2 class="font-semibold text-lg">{{ item.judul }}</h2>
                    <p class="text-gray-700 text-sm mt-1">
                        {{ item.isi.substring(0, 100) }}...
                    </p>
                    <p class="text-xs text-gray-500 mt-2">
                        Oleh: {{ item.user.email }}
                    </p>
                </div>

                <form @submit.prevent="hapus(item.id)">
                    <button class="text-red-500 hover:underline">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    berita: Array,
});

const hapus = (id) => {
    if (confirm("Yakin ingin menghapus berita ini?")) {
        router.delete(`/berita/${id}`);
    }
};
</script>
