echo '<div class="project-item" data-projectid="'.$row["projet_id"].'">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 210 210"
                        style=" fill:#000000;">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <path d="M0,210v-210h210v210z" fill="none"></path>
                            <g fill="#ffffff">
                                <g id="surface1">
                                    <path
                                        d="M25.2,8.4c-13.86328,0 -25.2,11.33672 -25.2,25.2v121.8c0,13.86328 11.33672,25.2 25.2,25.2h184.8v-151.2h-160.45312c-2.08359,-11.79609 -11.96016,-21 -24.34687,-21zM25.2,16.8c9.31875,0 16.8,7.48125 16.8,16.8v103.09688c-4.4625,-4.01953 -10.35234,-6.49687 -16.8,-6.49687c-6.44766,0 -12.3375,2.47734 -16.8,6.49687v-103.09688c0,-9.31875 7.48125,-16.8 16.8,-16.8zM50.4,37.8h151.2v134.4h-176.4c-9.31875,0 -16.8,-7.48125 -16.8,-16.8c0,-9.31875 7.48125,-16.8 16.8,-16.8c9.31875,0 16.8,7.48125 16.8,16.8h8.4zM147,63l11.73047,11.73047l-22.23047,22.23047l-22.90312,-22.91953l-36.55313,32.00859l5.5125,6.3l30.64687,-26.79141l23.29688,23.28047l28.16953,-28.16953l11.73047,11.73047v-29.4zM71.4,134.4v8.4h105v-8.4z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="project-info">
                    <div class="project_title">
                '.$row["nom_projet"].'
                    </div>
                    <div class="user_name">
                    '.$row["nom"].'
                    </div>
                </div>
            </div>'