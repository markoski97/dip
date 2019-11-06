<p>
    <div class="text-center">
    <a href="{{route('laminat.index')}}" class="btn btn-primary btn-block text-center">Отстраниги филтрите</a>
</div>
</p>

<h4 class="text-center">Боја:</h4>
@include('laminat.partials._filter_list',[
'map'=>['Светла' => 'Светла','Средна' => 'Средна','Темна' => 'Темна'],
'key'=>'boja',
])
<h4 class="text-center">Тип на отпорност:</h4>
@include('laminat.partials._filter_list',[
'map'=>['AC3'=>'AC3','AC4'=>'AC4','AC5'=>'AC5'],
'key'=>'klasanaotpornost',
])
<h4 class="text-center">Систен на греење:</h4>

@include('laminat.partials._filter_list',[
'map'=>['Подржува' => 'Подржува','Неподржува' => 'Неподржува'],
'key'=>'sistemnagreejne',
])
<h4 class="text-center">Дебелина:</h4>
@include('laminat.partials._filter_list',[
'map'=>['8'=>'8милиметри','10'=>'10милиметри','12'=>'12милиметри'],
'key'=>'debelina',
])

