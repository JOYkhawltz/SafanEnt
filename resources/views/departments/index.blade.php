@extends('layouts.app', ['page' => 'Departments', 'pageSlug' => 'departments', 'section' => 'departments'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Departments</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('departments.create') }}" class="btn btn-sm btn-primary">Add Department</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th>Name</th>
                                <th>Email / Telephone</th>
                                <th>Balance</th>
                                <th>Purchases</th>
                                <th>Total Payment</th>
                                <th>Last purchase</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ $department->name }}<br>{{ $department->document_type }}-{{ $department->document_id }}</td>
                                        <td>
                                            <a href="mailto:{{ $department->email }}">{{ $department->email }}</a>
                                            <br>
                                            {{ $department->phone }}
                                        </td>
                                        <td>
                                            @if (round($department->balance) > 0)
                                                <span class="text-success">{{ format_money($department->balance) }}</span>
                                            @elseif (round($department->balance) < 0.00)
                                                <span class="text-danger">{{ format_money($department->balance) }}</span>
                                            @else
                                                {{ format_money($department->balance) }}
                                            @endif
                                        </td>
                                        <td>{{ $department->sales->count() }}</td>
                                        <td>{{ format_money($department->transactions->sum('amount')) }}</td>
                                        <td>{{ ($department->sales->sortByDesc('created_at')->first()) ? date('d-m-y', strtotime($department->sales->sortByDesc('created_at')->first()->created_at)) : 'N/A' }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('departments.show', $department) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('departments.edit', $department) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit department">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('departments.destroy', $department) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete department" onclick="confirm('Estás seguro que quieres eliminar a este department? Los registros de sus compras y Transactions no serán eliminados.') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $departments->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
