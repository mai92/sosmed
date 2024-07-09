<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { Textarea } from "@/Components/ui/textarea";
import { Button } from "@/Components/ui/button/index.js";
import {
    Card,
    CardContent,
    CardFooter,
    CardHeader,
} from "@/Components/ui/card/index.js";
import { Avatar, AvatarImage } from "@/Components/ui/avatar/index.js";
import {
    HoverCard,
    HoverCardContent,
    HoverCardTrigger,
} from "@/Components/ui/hover-card/index.js";
import { Label } from "@/Components/ui/label/index.js";

const props = defineProps({
    tweets: Object,
    follows: Object,
});

const form = useForm({
    content: "",
});

const submit = () => {
    form.post(route("tweet.store"), {
        onSuccess: () => form.reset("content"),
    });
};

const like = (id) => {
    alert(id);
};
</script>

<template>
    <Head title="Timeline" />

    <AuthenticatedLayout>
        <template #right-sidebar>
            <Card>
                <CardHeader>
                    <Label class="font-bold text-lg">Who to Follow</Label>
                </CardHeader>
                <CardContent v-for="follow in follows">{{
                    follow.name
                }}</CardContent>
            </Card>
        </template>
        <div class="space-y-2">
            <Card>
                <CardContent class="py-4">
                    <form @submit.prevent="submit" class="space-y-2">
                        <Textarea
                            placeholder="Write your status..."
                            v-model="form.content"
                        ></Textarea>
                        <div class="flex justify-end">
                            <Button
                                class="bg-primary text-primary-foreground hover:bg-primary/90"
                            >
                                Tweet
                            </Button>
                        </div>
                    </form>
                </CardContent>
            </Card>
            <div class="flex flex-col space-y-2">
                <Link
                    v-for="tweet in tweets.data"
                    :href="route('tweet.show', tweet.id)"
                >
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
                                <HoverCardTrigger>
                                    <Link
                                        class="hover:text-teal-500"
                                        :href="
                                            route('profile.show', tweet.user)
                                        "
                                        >{{ tweet.user.name }}
                                    </Link>
                                    |
                                    {{ tweet.tweeted_at }}
                                </HoverCardTrigger>
                                <HoverCardContent>
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Ad consectetur et libero
                                    odit voluptate, voluptatum.
                                </HoverCardContent>
                            </HoverCard>
                        </CardHeader>
                        <CardContent>
                            {{ tweet.content }}
                        </CardContent>
                        <CardFooter class="justify-end space-x-4">
                            <div class="flex space-x-1 items-center">
                                <svg
                                    data-slot="icon"
                                    fill="none"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true"
                                    class="h-5 w-5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z"
                                    ></path>
                                </svg>
                                <span>({{ tweet.comment_count }})</span>
                            </div>
                            <div
                                class="flex space-x-1"
                                @click.prevent="like(tweet.id)"
                            >
                                <svg
                                    data-slot="icon"
                                    fill="none"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true"
                                    class="h-5 w-5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z"
                                    ></path>
                                </svg>
                            </div>
                        </CardFooter>
                    </Card>
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
