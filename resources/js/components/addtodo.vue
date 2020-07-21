<template>
    <div class="addtodo">
        <div class="input">
            <input type="text" name='addtodo' v-model="todoValue" @blur="checkInput" :class="{active: inputTodo}"/>
            <label for="addtodo">Add Todo</label>
        </div>
        <div class="btn" @click="addTodo()">
            <f-a-i :icon="['fas', 'plus']" />
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
    name: 'addtodo',
    data () {
        return {
            todoValue: '',
            inputTodo: false,
        }
    },
    methods: {
        checkInput() {
            if (this.todoValue.trim() != '') this.inputTodo = true
            else this.inputTodo = false;
        },
        addTodo() {
            if(this.todoValue.trim() == '') return console.log('Enter Value');
            this.addTodos(this.todoValue);
            this.todoValue = '';
            this.checkInput();
        },
        ...mapActions(['addTodos'])
    }
}
</script>

<style lang="scss" scoped>
@use '../../sass/use/variables';
@use '../../sass/use/mixins';

.addtodo {
    margin: 20px 10px 0 10px;
    @media only screen and(min-width: 768px) {
        margin:20px 10vw 0 10vw;
    }
    @media only screen and(min-width: 1280px) {
        margin: 20px 20vw 0 20vw;
    }
    display: grid;
    grid-template-columns: auto 10%;
    box-shadow: 0 5px 5px -5px variables.$dark_gray;
    .input {
        position: relative;
        label {
            position: absolute;
            top: 13px;
            left: 18px;
            z-index:-1;
            font-size: 13pt;
            opacity: 0.5;
            transition: all 0.2s ease-in-out;
        }
        input {
            height: 50px;
            width: 100%;
            background: transparent;
            border: none;
            border-top: 1px solid variables.$text_light;
            border-right: 1px solid variables.$text_light;
            border-left: 1px solid variables.$text_light;
            opacity: 0.7;
            padding: 15px;
            color: variables.$text_light;
            transition: all 0.2s ease-in-out;
            font-size: 13pt;
            &:focus, &.active {
                opacity: 1;
                ~label {
                    font-size: 10pt;
                    top: -8px;
                    left: 20px;
                    z-index: 1;
                    opacity: 1;
                    background-color: variables.$gray;
                }
            }
        }
    }
    .btn {
        @include mixins.flex-just-align;
        cursor: pointer;
        box-shadow: 5px -5px 5px -5px variables.$dark_gray;
        transition: all 0.2s ease-out;
        &:hover {
            box-shadow: 1px -1px 3px -0.5px variables.$dark_gray;
            svg {
                color: variables.$addBtn;
                height: 30px;
                width: 30px;
            }
        }
        svg {
            transition: all 0.2s ease-out;
        }
    }
}
</style>