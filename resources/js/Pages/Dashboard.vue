<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { Textarea } from "@/Components/ui/textarea";
import { Button } from "@/Components/ui/button/index.js";
import {
    Card,
    CardContent,
    CardFooter,
    CardHeader,
} from "@/Components/ui/card/index.js";
import { Avatar, AvatarImage } from "@/Components/ui/avatar/index.js";
import { Label } from "@/Components/ui/label/index.js";
import {
    HoverCard,
    HoverCardContent,
    HoverCardTrigger,
} from "@/Components/ui/hover-card/index.js";

const form = useForm({
    content: "",
});

const submit = () => {
    form.post(route("tweet.store"), {
        onSuccess: () => form.reset("content"),
    });
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div
                class="max-w-7xl mx-auto px-6 lg:px-8 flex flex-col md:flex-row"
            >
                <div class="w-full md:w-1/4">
                    <h1>Home</h1>
                </div>
                <div class="w-full md:w-3/4 space-y-4">
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-2"
                    >
                        <form @submit.prevent="submit">
                            <Textarea
                                placeholder="Write your status..."
                                v-model="form.content"
                            ></Textarea>

                            <Button>Tweet</Button>
                        </form>
                    </div>

                    <Card>
                        <CardHeader
                            class="flex flex-row items-center space-x-4"
                        >
                            <Avatar>
                                <AvatarImage
                                    src="https://2.gravatar.com/avatar/84d73cf8f0a6e4d86b7b2d2f23700c2b2ac6f9ffb9df527b8d8e469118250752?size=512"
                                ></AvatarImage>
                            </Avatar>
                            <HoverCard>
                                <HoverCardTrigger>Amirul</HoverCardTrigger>
                                <HoverCardContent>
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Ad consectetur et libero
                                    odit voluptate, voluptatum.
                                </HoverCardContent>
                            </HoverCard>
                        </CardHeader>
                        <CardContent>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Ad aliquam, at dolor dolore enim excepturi
                            expedita fuga harum illo impedit, incidunt labore
                            laboriosam mollitia quaerat reprehenderit, sed sit
                            veniam voluptas!
                        </CardContent>
                        <CardFooter class="justify-end">
                            Comment | Like
                        </CardFooter>
                    </Card>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
