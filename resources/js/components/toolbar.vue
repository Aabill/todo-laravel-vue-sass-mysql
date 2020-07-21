<template>
    <div class="toolbar">
        <div class="logo" >
            <a href="/">Todo</a>
        </div>
        <div class="filter">
            <select @change="filterChange($event)">
                <option value="All" selected v-text="'All'" />
                <option v-for="option in filterOptions" :key="option" 
                :value="option" v-text="option" />
                
            </select>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
    name: 'toolbar',
    data() {
        return {
            filterOptions: [200, 100, 50, 30, 10, 5]
        }
    },
    methods: {
        ...mapActions(['filterTodos']),
        filterChange(e){
            this.filterTodos(e.target.value);
        }
    }
}
</script>

<style lang="scss" scoped>
@use '../../sass/use/variables';
.toolbar {
    height: 50px;
    box-shadow: 0 1px 3px 1px variables.$test;
    display: flex;
    .logo{
        margin: auto auto auto 10px;
        a {
            color: variables.$text_light;
            outline: none;
            text-decoration: none;
        }
    }
    .filter {
        margin: auto 20px auto 0;
        select {
            height: 30px;
            width: 20vw;
            background: transparent;
            outline: none;
            border: none;
            cursor: pointer;
            box-shadow: 0 0.5px 1px 1px variables.$dark_gray;
            transition: all 0.1s ease;
            &:hover {
                box-shadow: -1px 1px 3px 0 variables.$dark_gray;
            }
            option {
                background: variables.$dark_gray;
            }
        }
    }
}
</style>