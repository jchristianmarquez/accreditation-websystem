<link rel="stylesheet" href="{{ url('/css/styles.css') }}">
<x-accreditor-layout>
    @foreach ($departments as $department)
        <x-programselection-layout>
            <x-slot name="deptHeading">
                {{$department->longname}}
            </x-slot>
            <x-slot name="deptDecs">
                {{$department->description}}
            </x-slot>
            <x-slot name="cards">
                <div class="department-row">
                @foreach ($programs->where('department', $department->shortname) as $program)
                    <x-programcard>
                        <x-slot name="deptLogo">
                            <img src="/images/{{$department->shortname}}.png" alt="{{$programs[0]->shortname}}">
                        </x-slot>
                        <p>{{$program->longname}}</p>
                        @foreach ($reportTypes as $report)
                            <x-report-types type="{{$department->shortname}}">
                                <x-slot name="link">/accreditor/{{$program->shortname}}/1/{{$report->reportType}}</x-slot>
                                {{$report->reportLabel}}
                            </x-report-types>
                        @endforeach
                    </x-programcard>
                @endforeach
                </div>
            </x-slot>
        </x-programselection-layout>
    @endforeach
</x-accreditor-layout>
