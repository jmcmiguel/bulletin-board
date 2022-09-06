<template></template>

<script>
export default {
    mounted() {
        axios
            .get("https://api.coindesk.com/v1/bpi/currentprice.json")
            .then((response) => (this.info = response));
    },
};
</script>
