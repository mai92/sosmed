<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Label } from "@/Components/ui/label/index.js";

const props = defineProps({
    user: Object,
});
</script>

<template>
    <Head title="Profile" />
    <AuthenticatedLayout>
        <Label>{{ user.username }}</Label>
    </AuthenticatedLayout>
</template>
