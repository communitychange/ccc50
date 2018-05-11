<?php
/**
 * Template Name: Presidents CCC
 * Author: Anh K. Hoang
**/
?>
<!DOCTYPE html>
<html>
  <body>
    <!-- As if this Glitch were a typical HTML CodePen... -->    
    <script src="https://aframe.io/releases/0.7.0/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-look-at-component@0.5.1/dist/aframe-look-at-component.min.js"></script>
    <script src="https://npmcdn.com/aframe-animation-component@3.0.1"></script>
    <style>
      body,html{width:100%;height:100%;background-color:#232323}#splash{position:fixed;z-index:999;display:flex;align-items:center;justify-content:center;top:0;bottom:0;left:0;right:0;margin:auto;background-color:#232323}@keyframes spin{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}.loading{width:24px;height:24px;border-radius:50%;border:.25rem solid rgba(255,255,255,0.2);border-top-color:#fff;animation:spin 1s infinite linear}
    </style>
     <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
          var scene = document.querySelector('a-scene');
          var splash = document.querySelector('#splash');
          scene.addEventListener('loaded', function (e) {
              splash.style.display = 'none';
          });
      });
    AFRAME.registerComponent('image-grid', {
      schema: {},
      init: function () {
        var fuse = document.querySelector('#fuse-cursor');
        var fuseProgress = document.querySelector('#fuse-progress');
        var camera = document.querySelector('#main-camera-wrapper');
        var images = document.querySelectorAll('a-image');
        var CAMERA_Z = 2.7;

        fuse.addEventListener('fusing', function (e) {
            fuseProgress.emit('fusing');
        });

        images.forEach(function(image) {
          image.setAttribute('look-at', '[camera]');
          image.addEventListener('click', function(e) {
            var position = this.getAttribute('position')
            camera.setAttribute('animation', {
              to: {x: position.x, y: position.y, z: CAMERA_Z}
            })
            camera.emit('imageClicked')
          })
        })
      }
    });
    AFRAME.registerComponent('link-url', {
      schema: {default: ''},
      init: function () {
        var url = this.data;
        this.el.addEventListener('click', function () {
          window.location.href = url;
        });
      }
    });
    </script>
    <body>  
       <div id="splash">
       <div class="loading"></div>
     </div> 
     <a-scene image-grid fog="color: #ffffff; far: 11.60; type: linear;">
       <a-assets>
         <audio id="click-sound" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/audio/click.ogg"></audio>
         <img crossorigin="anonymous" id="jack-conway" src="https://ccc50.communitychange.org/wp-content/uploads/2018/02/jack-conway.png">
         <img crossorigin="anonymous" id="david-ramage" src="https://ccc50.communitychange.org/wp-content/uploads/2018/02/david-ramage.jpg">
         <img crossorigin="anonymous" id="pablo" src="https://ccc50.communitychange.org/wp-content/uploads/2018/02/pablo-copy.jpg">
         <img crossorigin="anonymous" id="andy" src="https://ccc50.communitychange.org/wp-content/uploads/2018/02/andymott.jpg">
         <img crossorigin="anonymous" id="deepakb" src="https://ccc50.communitychange.org/wp-content/uploads/2018/02/4454443105_3fdf5869b1_o.jpg">
         <img crossorigin="anonymous" id="dorian" src="https://ccc50.communitychange.org/wp-content/uploads/2018/02/dtw_photo.jpg">
        </a-assets>
       <a-sky id="sky" position="0 0 0" rotation="0 0 0" scale="-1 1 1" radius="5000" segments-width="64"
       segments-height="20" color="#072036" opacity="1" flat-shading="true" shader="standard"
       side="double" repeat="1 1" visible="true"></a-sky>

       <a-entity id="main-camera-wrapper" position="0.12 4.14 4.93" rotation="0 -0.35 0" animation="property: position; easing: easeOutQuad; startEvents: imageClicked;">
         <a-camera id="main-camera" user-height="0" visible="true" wasd-controls="enabled: false;"
                   cursor="rayOrigin: mouse;" raycaster="objects: .clickable">
           <a-cursor id="fuse-cursor" fuse="true" geometry="radiusInner: 0.02; radiusOuter: 0.03; thetaLength: 360; thetaStart: 90;"
                     color="#232323" opacity="1" repeat="1 1" shader="flat" position="0 0 -1" objects=".clickable"
                     rotation="0 0 0" scale="1 1 1" visible="true"></a-cursor>
           <a-ring id="fuse-progress" radius-inner="0.02" radius-outer="0.03" theta-length="360"
                   theta-start="90" color="#FFE066" opacity="0" repeat="1 1" shader="flat" position="0 0 -0.999"
                   rotation="0 0 0" scale="1 1 1" visible="true" class="clickable" animation="delay: 0; dir: normal; dur: 1500; easing: linear; loop: 0; property: geometry.thetaLength; startEvents: fusing; to: 0; from: 360;"
                   animation__1="delay: 0; dir: normal; dur: 500; easing: linear; loop: 0; property: opacity; startEvents: fusing; to: 1; from: 0;"></a-ring>
         </a-camera>
       </a-entity>

      <!-- profile images -->
      <a-image id="jack-img" class="clickable" position="-5.40 7.60 -2.00" rotation="0.00 0 0.00"
       scale="1 1 1" width="4" height="4" shader="flat" side="double"
       src="#jack-conway" metalness="0.5" roughness="1" repeat="1 1" visible="true"></a-image>
       
       <a-image id="david-img" class="clickable" position="0.00 10.00 -2.00" rotation="-5 45 0" scale="1 1 1"
       width="4" height="3" shader="flat" side="double" src="#david-ramage"
       metalness="0.5" roughness="1" repeat="1 1" visible="true"></a-image>

       <a-image id="pablo-img" class="clickable" position="7.50 7.50 -2.00" rotation="15 0 0" scale="1 1 1"
       width="4" height="3.20" color="#ffffff" opacity="1" shader="flat" side="double" src="#pablo"
       metalness="0.5" roughness="1" repeat="1 1" visible="true"></a-image>

       <a-image id="andy-img" class="clickable" position="-3.40 2.25 -2.00" rotation="0.00 0 0.00"
       scale="1 1 1" width="3" height="4" shader="flat" side="double"
       src="#andy" metalness="0.5" roughness="1" repeat="1 1" visible="true"></a-image>

       <a-image id="deepak-img" class="clickable" position="2.5 2.20 -2.00" rotation="0 0 0" scale="1 1 1"
       width="4" height="2.8" color="#ffffff" opacity="1" shader="flat" side="double" src="#deepakb"
       metalness="0.5" roughness="1" repeat="1 1" visible="true"></a-image>
       
      <a-text link-url="href:https//communitychange.org" id="headline-caption" position="0.40 5.25 1.5" rotation="0 0 0" scale="1.5 1.5 1.5"
       value="LEADERSHIP AT CCC" font="https://cdn.glitch.com/13258c51-0acc-4d99-ab9f-85f8eec172c6%2FOswald-Bold.fnt?1506384504220" font-image="https://cdn.glitch.com/13258c51-0acc-4d99-ab9f-85f8eec172c6%2FOswald-Bold.png?1506384504242" align="center" opacity="1"
       color="#FFE066" wrap-count="36" letter-spacing="16.20" line-height="64" width="4.00"
       height="0" side="double" anchor="center" visible="true"></a-text>


       <!-- leaders title text -->
       <a-text link-url="href:https://www.washingtonpost.com/archive/local/1998/01/08/labor-leader-jack-t-conway-dies" id="jack-caption" position="-5.40 5.00 -1.80" rotation="0 15 0" scale="1 1 1"
       value="JACK T. CONWAY, PRESIDENT OF CCC (1968-1972)" font="https://cdn.glitch.com/13258c51-0acc-4d99-ab9f-85f8eec172c6%2FOswald-Bold.fnt?1506384504220" font-image="https://cdn.glitch.com/13258c51-0acc-4d99-ab9f-85f8eec172c6%2FOswald-Bold.png?1506384504242" align="center" opacity="1"
       color="#232323" wrap-count="36" letter-spacing="16.20" line-height="64" width="4.00"
       height="0" side="double" anchor="center" visible="true"></a-text>
       
       <a-text id="david-caption" position="0.00 8.0 -2.00" rotation="0 0 0" scale="1 1 1"
       value="DAVID RAMAGE, PRESIDENT OF CCC (1972 - 1975)" font="https://cdn.glitch.com/13258c51-0acc-4d99-ab9f-85f8eec172c6%2FOswald-Bold.fnt?1506384504220" font-image="https://cdn.glitch.com/13258c51-0acc-4d99-ab9f-85f8eec172c6%2FOswald-Bold.png?1506384504242" align="center" opacity="1" color="#232323"
       wrap-count="36" letter-spacing="16.20" line-height="64" width="4.00" height="0" side="double"
       anchor="center" visible="true"></a-text>
       
       <a-text id="andy-caption" position="-3.0 1.0 -0.30" rotation="0 0 0" scale="1 1 1"
       value="ANDY MOTT, EXECUTIVE DIRECTOR OF CCC (1998)" font="https://cdn.glitch.com/13258c51-0acc-4d99-ab9f-85f8eec172c6%2FOswald-Bold.fnt?1506384504220" font-image="https://cdn.glitch.com/13258c51-0acc-4d99-ab9f-85f8eec172c6%2FOswald-Bold.png?1506384504242" align="center" opacity="1" color="#232323"
       wrap-count="36" letter-spacing="16.20" line-height="64" width="4.00" height="0" side="double"
       anchor="center" visible="true"></a-text>
       
       <a-text id="pablo-caption" position="7.0 5.5 -2.30" rotation="0 0 5"
       scale="1 1 1" value="PABLO EISENBERG, PRESIDENT OF CCC (1975 - 1998 ) " font="https://cdn.glitch.com/13258c51-0acc-4d99-ab9f-85f8eec172c6%2FOswald-Bold.fnt?1506384504220" font-image="https://cdn.glitch.com/13258c51-0acc-4d99-ab9f-85f8eec172c6%2FOswald-Bold.png?1506384504242" align="center"
       opacity="1" color="#232323" wrap-count="36" letter-spacing="16.20" line-height="64"
       width="4.00" height="0" side="double" anchor="center" visible="true"></a-text>

       <a-text id="deepak-caption" position="2.5 1 -0.50" rotation="0 0 0" scale="1 1 1"
       value="DEEPAK BHARGAVA, PRESIDENT OF CCC (2002 - CURRENT)" font="https://cdn.glitch.com/13258c51-0acc-4d99-ab9f-85f8eec172c6%2FOswald-Bold.fnt?1506384504220" font-image="https://cdn.glitch.com/13258c51-0acc-4d99-ab9f-85f8eec172c6%2FOswald-Bold.png?1506384504242" align="center" opacity="1"
       color="#232323" wrap-count="36" letter-spacing="16.20" line-height="64" width="4.00"
       height="0" side="double" anchor="center" visible="true"></a-text>

       <!-- bios -->
        
        <a-entity id="jack-info" link-url="href:https://www.washingtonpost.com/archive/local/1998/01/08/labor-leader-jack-t-conway-dies" rotation="0 45 0" geometry="primitive: plane; width: 3; height: auto;" position="-8.40 6.70 -0.30" material="color: #f6a623" text="font:  https://cdn.aframe.io/fonts/KelsonSans.fnt; value: Mr. Conway was a soft-spoken and reserved man with a wry sense of humor. He also was a staunch Democrat. He first came to Washington in 1961 to serve in President John F. Kennedy's administration as deputy administrator of the Housing and Home Financing Agency. By then, he was a well-known labor leader and longtime aide to United Auto Workers President Walter Reuther. 

        He served two years in the Kennedy administration and helped to shape the Omnibus Housing Act of 1961 and to lay the groundwork for the new Department of Housing and Urban Development. He soon returned to his labor"></a-entity>

        <a-entity id="david-info" geometry="primitive: plane; width: 3; height: auto;" rotation="0 -45 0" position="3.55 10.0 -1.00" material="color: #003b71" text="font:  https://cdn.aframe.io/fonts/KelsonSans.fnt; value: After earning his B.D. from McCormick, where his studies combined theology and social work, Ramage briefly served a church on Chicago’s South Side before working at the Presbytery of Chicago as Director of Urban Ministry, followed by the PCUSA national office as director of a major division of the Board of National Missions and, finally, the World Council of Churches before coming to McCormick. Ramage’s involvement in ecumenical circles also focused on community organizing and social justice, as Executive Director of the Center for Community Change in Washing­ton, D.C., and as President of the New World Foundation in New York City. He was also one of the key leaders in organizing the Parliament for the World’s Religions centennial meeting in Chicago in 1993 out of which came the organization by the same name. Source: mccormick.edu"></a-entity>

         <a-entity id="pablo-info" geometry="primitive: plane; width: 3; height: auto;" position="10.0 7.5 1.30" material="color: #f16724" rotation="0 -45 0" text="font:  https://cdn.aframe.io/fonts/KelsonSans.fnt; value: Eisenberg served for 23 years as Executive Director of the Center for Community Change, a national technical assistance and advocacy organization working with low-income constituencies nationwide. He has actively contributed to national discourse on government accountability and reform, the role of philanthropy, and the achievements and problems of the nonprofit sector. Eisenberg has published numerous articles and chapters of books, and is a regular contributor to the Huffington Post, Inside Higher Education, and has a regular monthly column in The Chronicle of Philanthropy. He has held senior positions with the U.S. Information Agency in Africa, Operation Crossroads Africa, Office for Economic Opportunity, and the National Urban Coalition. He is a founder and board member of the National Committee for Responsive Philanthropy. The Nonprofit Times selected Eisenberg as one of the 50 most influential people in the American nonprofit sector. That same year, he was the recipient of the national John Gardner Leadership Award sponsored by the Independent Sector. Source: georgetown.edu"></a-entity>

         <a-entity id="andy-info" geometry="primitive: plane; width: 3; height: auto;" position="-6.40 2.25 -1.0" material="color: #ffdd0f" rotation="0 45 0" text="font:  https://cdn.aframe.io/fonts/KelsonSans.fnt; value: Andy is the founder and former Executive Director of the Community Learning Partnership.   Before founding CLP, Andy served as Executive Director of the Center for Community Change, a national nonprofit which helps grassroots groups build the power and capacity to change their communities and public policies for the better, where he worked for more than 35 years.  He also chaired several national coalitions including the National Low Income Housing Coalition and the Coalition on Human Needs.  At CLP, he served as convenor of the International Working Group on University Education for Community Change which brought together people involved in various parts of the world in creating undergraduate and graduate programs to prepare people to work on the front lines of community and social change.  Mott graduated from Harvard College and the University of Michigan Law School, and served as Assistant Professor of National Development at Pahlavi University in Iran. Source: cornell.edu"></a-entity>

         <a-entity id="deepak-info" geometry="primitive: plane; width: 3; height: auto;" position="6.8 1.5 -0.9" material="color: #003b71" rotation="0 -35 0" text="font:  https://cdn.aframe.io/fonts/KelsonSans.fnt; value: Deepak Bhargava is executive director of the Center for Community Change, a national nonprofit organization whose mission is to develop the power and capacity of low-income people, especially low-income people of color, to change the policies and institutions that affect their lives. As executive director, Bhargava has led the center's work on immigration reform and spearheaded the creation of initiatives that develop the next generation of community organizers and bring large numbers of low-income voters into the electoral process. Prior to working at the center, Bhargava directed the National Campaign for Jobs and Income Support, and ran numerous national campaigns that have helped improve the lives of low-income families.

         Bhargava has written on issues like poverty, racial justice, immigration reform, community organizing, and economic justice for publications including the American Prospect, the Nation, the New York Times, and the Washington Post. He has also provided intellectual and policy leadership on these issues by testifying before Congress more than 20 times, and serves on the boards of the Coalition for Comprehensive Immigration Reform, the Discount Foundation, the League of Education Voters, and the Nation editorial board.  Bhargava graduated summa cum laude from Harvard College.  Source: opensocietyfoundations.org"></a-entity>
             
     </a-scene>
   </body>
    </body>
</html>
