<?php $i=1; ?>
        @foreach($usersinfo as $userdata)
      <tr>
      <td>{{$i}}</td>
        <td>{{$userdata->name}}</td>
        <td>{{$userdata->email}}</td>
      </tr>
      
      <?php $i++; ?>
            @endforeach