export function subscribeToNewsletter() {
    this.subscribeToNewsletterButtonText = "SUBMITTING";
    this.isSubscribeToNewsletterButtonDisabled = true;

    let data = new FormData(this.$refs.subscribeToNewsletterForm);
    let url = data.get('url').toString();

    axios.post(url, data)
        .then((response) => {
            this.subscribeToNewsletterName = "";
            this.subscribeToNewsletterEmail = "";

            this.modalSuccessMessage = "Thanks for subscribing!<br>We’ll keep you posted.";
            this.modalSuccess.show();
        }).catch((error) => {
            this.showRequestError(error);
        }).then(() => {
            // this.$set(this, 'subscribeToNewsletterButtonText', "KEEP ME POSTED!");
            // this.$set(this, 'isSubscribeToNewsletterButtonDisabled', false);
            this.subscribeToNewsletterButtonText = "KEEP ME POSTED!";
            this.isSubscribeToNewsletterButtonDisabled = false;
            // this.$nextTick();
        });
}
