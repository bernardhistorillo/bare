import UnderConstruction from "./components/under-construction/UnderConstruction.vue";
import Home from "./components/home/Home.vue";
import NotFound from "./components/NotFound.vue";

export default [
    {
        path: '/',
        name: 'under-construction',
        component: UnderConstruction,
        meta: {
            metaInfo: {
                title: 'Sign Up Now!',
                meta: [
                    {
                        name: 'description',
                        content: 'Sign Up & Get 20% Discount On Our Launch!',
                    },
                ],
                og: [
                    {
                        name: 'description',
                        content: 'Sign Up & Get 20% Discount On Our Launch!',
                    }, {
                        name: 'image',
                        content: 'img/home/og-4.jpg',
                    }
                ],
            },
        },
    }, {
        path: '/home',
        name: 'home',
        component: Home,
        meta: {
            metaInfo: {
                title: 'Home',
                meta: [
                    {
                        name: 'description',
                        content: 'Sign Up & Get 20% Discount On Our Launch!',
                    },
                ],
                og: [
                    {
                        name: 'description',
                        content: 'Sign Up & Get 20% Discount On Our Launch!',
                    }, {
                        name: 'image',
                        content: 'img/home/og-4.jpg',
                    }
                ],
            },
        },
    }, {
        path: '/shop',
        name: 'shop',
        component: Home,
        meta: {
            metaInfo: {
                title: 'Shop',
                meta: [
                    {
                        name: 'description',
                        content: 'Sign Up & Get 20% Discount On Our Launch!',
                    },
                ],
                og: [
                    {
                        name: 'description',
                        content: 'Sign Up & Get 20% Discount On Our Launch!',
                    }, {
                        name: 'image',
                        content: 'img/home/og-4.jpg',
                    }
                ],
            },
        },
    }, {
        path: '/:catchAll(.*)',
        component: NotFound
    }
];
