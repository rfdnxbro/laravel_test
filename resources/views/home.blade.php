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

                    @{{ posts.total }}件
                    <table class="table">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>タイトル</th>
                            <th>本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="post in posts.data" v-bind:key="post.id" v-cloak>
                                <td>@{{ post.id }}</td>
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
