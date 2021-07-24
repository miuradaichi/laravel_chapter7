@extends('layout.default')
<style>
  th {
      background-color: black;
      color: white;
      padding: 5px 30px;
    }
    td {
      border: 1px solid black;
      padding: 5px 30px;
      text-align: center;
    }
    button {
      padding: 10px 20px;
      background: black;
      color: white;
    }
</style>
@section('title', 'delete.blade.php')

@section('content')
<form action="/delete" method="post">
  <table>
    @csrf
    <tr>
      <th>
        name
      </th>
      <td>
        {{$form->name}}
      </td>
    </tr>
    <tr>
      <th>
        age
      </th>
      <td>
        {{$form->age}}
      </td>
    </tr>
    <tr>
        <th>nationality</th>
        <td><input type="text" name="nationality" value="{{$form->nationality}}"></td>
    </tr>
    <tr>
        <th></th>
        <td><button>送信</button></td>
    </tr>
  </table>
</form>
@endsection