<?php include "includes/head.php"; ?>


<div class="container">

    <div class="content">
        <div class="nested-item">
            <h1>Matchtech Front End Strategy ideas</h1>
        </div>
    </div>

    <div class="content">
        <h2>Developer Console</h2>
    </div>

    <div class="content">

        <ul class="points">
            <li>
                <div class="col-1">
                    <h3>Start point</h3>
                </div>
                <div class="col-2">
                    <p>Reuse everything?</p>
                    <p><strong>Suggest</strong> having a seperate library, maybe strip back to the very basics, including js, as a starting point.</p>
                </div>
            </li>
        </ul>

    </div>


    <div class="content">

        <h2>Workflow</h2>

    </div>

    <div class="content">

        <ul class="points">
            <li>
                <div class="col-1">
                    <h3>Libsass</h3>
                </div>
                <div class="col-2">
                    <p>Work has been done on getting <strong><a href="http://sass-lang.com/libsass">Libsass</a></strong> into the current workflow and we could try to start using it.</p>
                    <p>By far the largest <strong>Benefit</strong> to using Libsass is speed. Whenever a sass file is saved, the whole projects worth of sass files is compiled. Large projects like HFD have a huge library of sass files to work through during that process. Machine speed will have an effect and with the native Ruby Sass/compass in use, compilation time ranges from around 20-40 seconds. With this happening every time the sass is edited and refreshed in the browser, it is a huge amount of time overhead. Depending on any particular developers method/habits this could be half an hour a day. Spread that over an entire project lifecycle and it puts things into context.</p>
                    <p>Research and setup carried out shows that by removing Singularity and its interdependancy on compass (which is incompatible with Libsass) cuts this compilation time right back to almost instantaneous.</p>
                    <p>As an example, the setup of this project, although relatively small and not using compass (which has a lot of things to import just by itself) still takes around 6 seconds to compile. Switch to libsass and this is cut to around 9 milliseconds (0.009 seconds). The effect this has on Workflow isn't just physical but phycological, having virtually no delay to see your changes makes things (including your brain) run a lot more smoothly.</p>
                    <p>Another <strong>benefit</strong> is that it takes away the need to add configuration for singularity/breakpoint and other tools in more than one place (config.rb is no longer needed).</p>
                    <p><strong>Concerns</strong> over it's use could be that it is still relatively early days for Libsass. This means that finding alternatives to widely used supporting tools like compass could currently be difficult (though not impossible).</p>
                    <p>After researching workarounds and also reading <a href="http://benfrain.com/libsass-lightning-fast-sass-compiler-ready-prime-time/">articles like this</a> It is my strong belief that finding a good alternative solution to things that compass currently fills will mean that going forward with libsass will get easier as it seems inevitable that libsass will take over as the compiler of choice.</p>
                </div>
            </li>
            <li>
                <div class="col-1">
                    <h3>Susy</h3>
                </div>
                <div class="col-2">
                    <p><strong><a href="http://susydocs.oddbird.net/en/latest/">Susy</a></strong> is also a very good grid system that has previously not been explored, this works well in the research being done (it was used to present this). Working this into what exists is not a small task though could be managable on a smaller scale stripped back version.</p>
                    <p><strong>Benefits</strong> include the fact you can use gutters all around an element, not just left and right. This means you won't have uneven spacing around grids.</p>
                    <p>Another <strong>benefit</strong> is the fact that it works well with breakpoint-sass, which is currently used on HFD. Both breakpoint and susy are installed locally via bower (rather than as a dependancy of compass), which is a robust way to do things anyway as it doesn't assume the presence of any other software on the current machine.</p>
                </div>
            </li>
            <li>
                <div class="col-1">
                    <h3>Importing whole folders (Globbing)</h3>
                </div>
                <div class="col-2">
                    <p>This was a <strong>concern</strong> and still one of the things that aren't perfect. The need to import sass files automatically is necessary when the library grows. The current setup uses a <a href="https://github.com/chriseppstein/sass-globbing">sass-globbing</a> Ruby gem. Ruby gems are not compatible with Libsass.</p>
                    <p>Research was done and many alternatives looked at. The best so far is a gulp tool called <a href="https://www.npmjs.com/package/gulp-sass-glob">gulp-sass-glob</a> which is nearly good enough. One <strong>concern</strong> is that it doesn't import things correctly in the situation where an ie8 stylesheet is generated forcing a re-import of the main sass file with no media queries. This has been resolved by copying the contents of the main sass file plus the settings for no query into a new file. I believe this to be an acceptable solution taking all the other benefits into account.</p>
                </div>
            </li>
        </ul>

    </div>

    <div class="content">

        <h2>Wireframe Observations</h2>

    </div>

    <div class="content">

        <ul class="points">
            <li>
                <div class="col-1">
                    <h3>Register link</h3>
                </div>
                <div class="col-2">
                    <p>Only on homepage (mobile)?</p>
                </div>
            </li>
            <li>
                <div class="col-1">
                    <h3>Menu link on mobile</h3>
                </div>
                <div class="col-2">
                    <p>Grouped with others and not next to logo (mobile, tablet)?</p>
                    <p>What does menu look like open (mobile, tablet)?</p>
                </div>
            </li>
            <li>
                <div class="col-1">
                    <h3>Main menu dropdowns</h3>
                </div>
                <div class="col-2">
                    <p>Spec states that the main menu will have dropdowns to aid users the navigate to child pages (desktop). This will be a major feature and it is important to understand how it is intended to behave as it has an effect on how it is built. A simple list of child pages would be built very differently to a 'mega dropdown' for instance.</p>
                </div>
            </li>
            <li>
                <div class="col-1">
                    <h3>Main menu fixed</h3>
                </div>
                <div class="col-2">
                    <p>It is important when the menu stick to the top of the page, that it is as small in height as possible so as to avoid the 'letterbox' effect on the rest of the page. Users shouldn't be restricted to a small section of their browser or it can be frustrating.</p>
                </div>
            </li>
        </ul>

    </div>

    <div class="content">

        <h2>General Considerations</h2>

    </div>

    <div class="content">

        <ul class="points">
            <li>
                <div class="col-1">
                    <h3>Inter-sites design and css</h3>
                </div>
                <div class="col-2">
                    <p>In order to keep all sites front end design modular and streamilined in terms of sass libraries used, elements should be strictly controlled and it should be appreciated by all parties that ANY changes to ANY elements can potentially affect other areas and/or sites in the projects range. These changes should not be made without some kind of process which has the design of the sites at the forefront.</p>
                    <p>Sass files should be written in such a way as to be able to have a new library imported over the top so that a new site can be 'skinned'. Structure will be very important here.</p>
                </div>
            </li>
        </ul>

    </div>

</div>
<!-- /container -->

<?php include "includes/foot.php"; ?>