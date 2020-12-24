@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1>



    @if(count($messages)>0)
    <div class="table-responsive">
        <table class="table ">
    <thead>
        <tr>
        <th>Nr</th>
        <th>Name</th>
        <th>Email</th>
        <th>Comment</th>
        <th>Created</th>
        </tr>
    </thead>
    <tbody>
<?php   $cnt=1;
        $faqja = $messages->currentPage()-1;
        $truefaqja = $faqja*100;
?>
        @foreach($messages as $message)
        <tr>
            <td><?php echo $cnt+$truefaqja; ?></td>
            <td>{{$message->name}}</td>
            <td>{{$message->email}}</td>
            <td>{{$message->comment}}</td>
            <td>{{$message->created_at}}</td>
        </tr>
        <?php $cnt++; ?>
        @endforeach
    </tbody>
</table>
</div>

{{$messages->links()}}

    @else
        <h3>No messages found </h3>
    @endif
@endsection
