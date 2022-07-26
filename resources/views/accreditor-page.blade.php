<x-accreditor-layout>
    <header>
        <div class="dci-logo">
            <img src="/images/{{$dept}}.png" alt="Silver Bikings">
            <h2 class="dci-heading-one">{{$deptTitle}}<br><p>{{$reportTypes->where('reportType', $report)->first()->reportLabel}}</p></h2>
        </div>
        <div class="dci-back-btn">
            <a href="#"><i class="fa-solid fa-chevron-left"></i>Back</a>
        </div>
    </header>
    <!-- sidebar starts here-->
    <nav class="dci-sidebar close">
        <header class="dci-sidebar-content">
            <div class="dci-dept-icon">
                <span class="dci-dept">
                    <i class="fa-solid fa-house-chimney"></i>
                </span>

                <div class="header-dci">
                    <span class="dci-nav-text"><a href="#">Department</a></span>
                </div>
            </div>
            <i class="fa-solid fa-angle-right toggle"></i>
        </header>

        <div class="dci-menu-bar">
            <div class="dci-menu">
                    <h4><i class="fa-solid fa-arrow-down-10-1"></i>Area</h4>
                <ul class="dci-menu-link">
                    @foreach ($areaList as $area)
                    <li class="dci-nav-link">
                        <a href="#">
                            <i class="fa-solid fa-{{$area->areaNumber}} icon"></i>
                            <span class="dci-nav-text">{{$area->areaName}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="dci-bottom-content">
                <div class="dci-menu">
                    <h4>Files</h4>
                </div>
                <li class="dci-bottom-icon">
                    <a href="#">
                        <i class="fa-solid fa-folder-open icon"></i>
                        <span class="dci-nav-text">Self - Survey Report</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>
<!-- sidebar ends here-->
{{-- <div class="frameContainer">
    <iframe src="/department-home" width="100%" height="680px">
</div> --}}
<!--main content starts here-->
<section class="dci-home">
    <h1>{{$programs->where('shortname', $program)->first()->longname}}</h1>
    <div class="dci-text">Welcome</div>
    <p>Kindly click the icons on the left side to navigate<br>
        the departments, areas, and files.</p>
    <div class="dci-ccc-image">
        <img src="/images/ccc-campus.png" alt="">
    </div>
    <p class="dci-ccc-tag">Competence. Commitment. Character</p>
</section>
<!--main content ends here-->

</x-accreditor-layout>
<script src="{{ asset('js/show-modal.js') }}"></script>
<script src="{{ asset('js/dci-interface.js') }}"></script>
