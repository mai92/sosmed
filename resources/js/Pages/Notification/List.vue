<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    notifications: Object,
});
</script>

<template>
    <Head title="Notifications" />
    <AuthenticatedLayout>
        <div class="space-y-4">
            <div
                class="bg-white shadow rounded-lg p-4"
                v-for="notification in notifications"
            >
                {{ notification.data.user.name }} Mengomentari "{{
                    notification.data.content
                }}"
            </div>
        </div>
    </AuthenticatedLayout>
</template>
