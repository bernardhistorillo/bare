export default {
    beforeRouteUpdate(to, from, next) {
        this.updateMetaInfo(to);
        next();
    },
    mounted() {
        this.updateMetaInfo(this.$route);
    },
    methods: {
        updateMetaInfo(route) {
            if (route.meta.metaInfo) {
                const { title, meta, og } = route.meta.metaInfo;
                document.title = title || 'Default Title';

                if (meta) {
                    meta.forEach((tag) => {
                        const existingTag = document.querySelector(`meta[name="${tag.name}"]`);
                        if (existingTag) {
                            existingTag.setAttribute('content', tag.content);
                        } else {
                            const newTag = document.createElement('meta');
                            newTag.setAttribute('name', tag.name);
                            newTag.setAttribute('content', tag.content);
                            document.head.appendChild(newTag);
                        }
                    });
                }

                if (og) {
                    meta.forEach((tag) => {
                        const existingTag = document.querySelector(`meta[property="og:${tag.name}"]`);
                        if (existingTag) {
                            existingTag.setAttribute('content', tag.content);
                        } else {
                            const newTag = document.createElement('meta');
                            newTag.setAttribute('property', "og:" + tag.name);
                            newTag.setAttribute('content', tag.content);
                            document.head.appendChild(newTag);
                        }
                    });
                }
            }
        },
    },
};
