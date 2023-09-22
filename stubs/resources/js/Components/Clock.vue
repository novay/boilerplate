<template>
    <div>
        <a href="javascript:;" class="text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-800 px-1.5 py-0.5 rounded text-gray-600 dark:text-gray-100">
            {{ formattedTime }}
        </a>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                currentTime: new Date(),
            };
        },
        computed: {
            formattedTime() {
                const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                const day = days[this.currentTime.getDay()];
                const date = this.currentTime.getDate();
                const month = this.currentTime.toLocaleString('default', { month: 'short' });
                const hours = this.currentTime.getHours();
                const minutes = this.currentTime.getMinutes();
                
                return `${day}, ${date} ${month} ${hours}:${minutes < 10 ? '0' : ''}${minutes}`;
            },
        },
        mounted() {
            this.updateTime();
            setInterval(this.updateTime, 1000);
        },
        methods: {
            updateTime() {
                this.currentTime = new Date();
            },
        },
    };
</script>