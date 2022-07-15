<x-app-layout>
    <x-programselection-layout>
        <x-slot name="deptHeading">
            {{$department[0]->longname}}
        </x-slot>
        <x-slot name="deptDecs">
            {{$department[0]->description}}
        </x-slot>
        <x-slot name="cards">
            <div class="department-row">
            @foreach ($programs as $program)
                <x-programcard>
                    <x-slot name="deptLogo">
                        <img src="/images/{{$department[0]->shortname}}.png" alt="{{$programs[0]->shortname}}">
                    </x-slot>
                    <p>{{$program->longname}}</p>
                    @foreach ($reportTypes as $report)
                        <x-report-types type="{{$department[0]->shortname}}">
                            <x-slot name="link">/1/BSCS/1/{{$report->reportType}}</x-slot>
                            {{$report->reportLabel}}
                        </x-report-types>
                    @endforeach
                </x-programcard>
            @endforeach
            </div>
        </x-slot>
    </x-programselection-layout>
</x-app-layout>
