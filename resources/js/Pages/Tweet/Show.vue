<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import {
    Card,
    CardContent,
    CardFooter,
    CardHeader,
} from "@/Components/ui/card/index.js";
import {
    HoverCard,
    HoverCardContent,
    HoverCardTrigger,
} from "@/Components/ui/hover-card/index.js";
import { Avatar, AvatarImage } from "@/Components/ui/avatar/index.js";
import { Label } from "@/Components/ui/label/index.js";
import { Textarea } from "@/Components/ui/textarea/index.js";
import { Button } from "@/Components/ui/button/index.js";

const props = defineProps({
    tweet: Object,
    comments: Object,
});

const form = useForm({
    content: "",
});

const submit = () => {
    form.post(route("tweet.comment.store", props.tweet.id), {
        onSuccess: () => form.reset("content"),
    });
};
</script>

<template>
    <Head title="Tweet" />
    <AuthenticatedLayout>
        <div class="w-full space-y-4">
            <Card>
                <CardHeader class="flex flex-row items-center space-x-4">
                    <Avatar>
                        <AvatarImage
                            src="https://2.gravatar.com/avatar/84d73cf8f0a6e4d86b7b2d2f23700c2b2ac6f9ffb9df527b8d8e469118250752?size=512"
                        ></AvatarImage>
                    </Avatar>
                    <HoverCard>
                        <HoverCardTrigger
                            >{{ tweet.user.name }} |
                            {{ tweet.tweeted_at }}
                        </HoverCardTrigger>
                        <HoverCardContent>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Ad consectetur et libero odit voluptate,
                            voluptatum.
                        </HoverCardContent>
                    </HoverCard>
                </CardHeader>
                <CardContent>
                    <p>{{ tweet.content }}</p>
                    <div class="flex py-4 justify-between">
                        <Label class="hover:text-teal-500">Comment</Label>
                        <Label>Like</Label>
                    </div>
                    <form @submit.prevent="submit">
                        <div class="space-y-2">
                            <Textarea
                                placeholder="Write your comment.."
                                v-model="form.content"
                            ></Textarea>
                            <div class="flex justify-end">
                                <Button
                                    class="bg-primary text-primary-foreground hover:bg-primary/90"
                                    >Post</Button
                                >
                            </div>
                        </div>
                    </form>

                    <div class="space-y-2">
                        <div
                            v-for="comment in comments.data"
                            class="w-full flex items-center space-x-3 py-4"
                        >
                            <div class="items-center">
                                <Avatar>
                                    <AvatarImage
                                        src="https://2.gravatar.com/avatar/84d73cf8f0a6e4d86b7b2d2f23700c2b2ac6f9ffb9df527b8d8e469118250752?size=512"
                                    ></AvatarImage>
                                </Avatar>
                            </div>

                            <div class="space-x-1">
                                <Label class="font-bold text-md">{{
                                    comment.user.name
                                }}</Label>
                                <span>@{{ comment.user.username }} . </span>
                                <span class="text-xs">{{
                                    comment.commented_at
                                }}</span>
                                <p>{{ comment.content }}</p>
                            </div>
                        </div>
                    </div>
                </CardContent>
            </Card>
        </div>
    </AuthenticatedLayout>
</template>
