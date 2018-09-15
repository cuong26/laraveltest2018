<ol class="dd-list">
    @foreach($data as $d)
        <li class="dd-item dd3-item" data-id="{{ $d->id }}">
        	<div class="dd-handle dd3-handle"></div>
            <div class="dd3-content">
                <span class="name">{{ $d->name }}</span>
            	@if(!$d->child->count())
            	<a href="javascript:void(0)" class="pull-right text-danger delete" title="Xóa" data-url="{{ url('admin/course-category/' . $d->id) }}"><i class="fa fa-times"></i></a>
            	@endif
                <a href="javascript:void(0)" class="pull-right text-warning edit" title="Sửa" data-id="{{ $d->id }}" data-toggle="modal" data-target="#edit-modal"><i class="fa fa-pencil"></i></a>
            </div>
            @if($d->child->count())
                @include('backend.course-category._nestable', ['data' => $d->child])
            @endif
        </li>
    @endforeach
</ol>