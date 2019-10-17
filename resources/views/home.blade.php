@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form>
                        <div class="form-group">
                            <label for="title">タイトル</label>
                            <input type="text" id="title" v-model="title" class="form-control" v-bind:class="{ 'is-invalid': errors.title }">
                            <p class="alert alert-danger" v-if="errors.title" v-html="errors.title"></p>
                        </div>
                        <div class="form-group">
                            <label for="content">本文</label>
                            <textarea v-model="content" id="content" class="form-control" v-bind:class="{ 'is-invalid': errors.content }"></textarea>
                            <p class="alert alert-danger" v-if="errors.content" v-html="errors.content"></p>
                        </div>
                        <input type="button" class="btn btn-primary center" @click="onSubmit()" value="投稿">
                    </form>
                    <br>


                    @{{ posts.total }}件
                    <table class="table">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>投稿者</th>
                            <th>タイトル</th>
                            <th>本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="post in posts.data" v-bind:key="post.id" v-cloak>
                                <td>@{{ post.id }}</td>
                                <td>@{{ post.user.name }}</td>
                                <td>@{{ post.title }}</td>
                                <td>@{{ post.content }}</td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
