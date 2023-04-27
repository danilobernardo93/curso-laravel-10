<h1>Dúvida {{$support->id}}</h1>

<x-alert/>

<form action="{{route('supports.update', $support->id)}}" method="post">
    @method('PUT')
    @include('admin.supports.partils.form', ['support' => $support])
</form>