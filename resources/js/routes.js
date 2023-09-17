import UnderConstruction from "./components/pages/UnderConstruction.vue";
import NotFound from "./components/NotFound.vue";

export default [
    {
        path: '/',
        name: '/underConstruction.index',
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
        path: '/:catchAll(.*)',
        component: NotFound
    }
];
