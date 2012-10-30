<?php
/* Ninja Simple Icon
* By Richie Mortimer, Uwe Walter, Mark Simpson, Juergen Buchberger
* Copyright (C) 2007 Richie Mortimer http://ninjaforge.com 
* Email: support@ninjaforge.com
* Release: 1.7.2

* Changelog
* 1.9.0 Date: Oct, 2012
*   Added support for Joomla 3.0
*   Removed support for Joomla 1.5
*
* 1.8.3 Date: Sept, 2011 State: Minor CSS fixes
*	Fixed css link background styling

* 1.8.2 Date: August, 2011 State: Bug Fix Release
*	Fixed CSS list-style issue (browser/template icons showing behind images)
* 	Tested and marked compatible with Joomla 1.7

* 1.8.1 : 24th August 2011
*	  Joomla 1.7 support
*	  Fixed list-style CSS issue
* 1.8.0 : 13th February 2011
*	  Joomla 1.6 Support.
*	  Moved assets to media folder
* 1.7.4 : October, 2010 - mark_up
*	  Minor fix to the title tooltip.
* 1.7.3 : September, 2010 - mark_up
*	  Added fallbacks for the Alt and Title text so that there is always a title tooltip, regardless of whether or not images are used.
* 1.7.2 : September, 2010 - mark_up
*	  Fixed bug which caused titles to not show in any vertical layout.
* 1.7.1 : September, 2010 - mark_up
*	  Fixed minor jfolder bug
* 1.7 : September, 2010 - mark_up
*     Added new style - icons below titles.
*	  Renamed the module from mod_ninja_simple_icons to mod_ninja_simple_icon_menu
*
* 1.6 : November, 09 - mark_up
*     Added support for 10 more icons (Now supports 20 icons)
* 
* 1.4 : Sept, 09 - mark_up
*     Made it XHTML compliant by moving CSS to the header and moving CSS out of the HTML
*
* 1.5 : November, 09 - mark_up
*     Added two new vertical styles (icon on left and right of title)
*     If this module has sucky code, blame me - MS
* 1.4 : Sept, 09 - mark_up
*     Made it XHTML compliant by moving CSS to the header and moving CSS out of the HTML
*
* 1.3 : June, 09 - mark_up
*     Fixed CSS overflow bug that caused scrollbars
*     Changed <br/> to <br /> 
*     Optimised CSS
*
* 1.2 : April, 09
*     Bugfix (undefined variables)
*     Added icon container top-margin.
*     Added show/hide icon titles
*     Added icon title color
*     Added icon title font-size
*     Added icon link target
*
* 1.1 January, 08
*	  	Include CSS Param Added
*	  	Force Validation Param Added
*
* 1.0 December, 07 : 
*     Vertical Or Horizontal
* 
*/
###################################################################
//Ninja Simple Icon
//Copyright 2007-2010 Richie Mortimer. NinjaForge.com. All rights reserved.

//This program is free software; you can redistribute it and/or
//modify it under the terms of the GNU General Public License
//as published by the Free Software Foundation; either version 2
//of the License, or (at your option) any later version.
//
//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU General Public License for more details.
//
//You should have received a copy of the GNU General Public License
//along with this program; if not, write to the Free Software
//Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
//License : http://www.gnu.org/copyleft/gpl.html GNU/GPL
###################################################################

// This is required by all extentions
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

// Lets include all the params
  $incCSS = $params->get( 'incCSS' );
  $moduleclass_sfx = $params->get( 'moduleclass_sfx' );
  $icon_orientation = $params->get( 'icon_orientation' );
  $icon_container_margin_top = $params->get( 'icon_container_margin_top' );
  $icon_titles = $params->get( 'icon_titles' );                             
  $icon_title_color = $params->get( 'icon_title_color' );
  $icon_title_fontsize = $params->get( 'icon_title_fontsize' );
  $icon_height = $params->get( 'icon_height' );
  $icon_width = $params->get( 'icon_width' );

  
  // we are going to store some params in an array
  // this will make it alot cleaner and easier to use later on
  // The params in the array are = 0-icon_status 1-icon_img, 2-icon_title, 3-icon_link, 4-icon_alt
   $iconParams = array (
		array($params->get('icon1_status'),$params->get('icon1_img'),$params->get('icon1_title'),$params->get('icon1_link'),$params->get('icon1_alt'),$params->get('icon1_target')),
		array($params->get('icon2_status'),$params->get('icon2_img'),$params->get('icon2_title'),$params->get('icon2_link'),$params->get('icon2_alt'),$params->get('icon2_target')),
		array($params->get('icon3_status'),$params->get('icon3_img'),$params->get('icon3_title'),$params->get('icon3_link'),$params->get('icon3_alt'),$params->get('icon3_target')),
		array($params->get('icon4_status'),$params->get('icon4_img'),$params->get('icon4_title'),$params->get('icon4_link'),$params->get('icon4_alt'),$params->get('icon4_target')),
		array($params->get('icon5_status'),$params->get('icon5_img'),$params->get('icon5_title'),$params->get('icon5_link'),$params->get('icon5_alt'),$params->get('icon5_target')),
		array($params->get('icon6_status'),$params->get('icon6_img'),$params->get('icon6_title'),$params->get('icon6_link'),$params->get('icon6_alt'),$params->get('icon6_target')),
		array($params->get('icon7_status'),$params->get('icon7_img'),$params->get('icon7_title'),$params->get('icon7_link'),$params->get('icon7_alt'),$params->get('icon7_target')),
		array($params->get('icon8_status'),$params->get('icon8_img'),$params->get('icon8_title'),$params->get('icon8_link'),$params->get('icon8_alt'),$params->get('icon8_target')),
		array($params->get('icon9_status'),$params->get('icon9_img'),$params->get('icon9_title'),$params->get('icon9_link'),$params->get('icon9_alt'),$params->get('icon9_target')),
		array($params->get('icon10_status'),$params->get('icon10_img'),$params->get('icon10_title'),$params->get('icon10_link'),$params->get('icon10_alt'),$params->get('icon10_target')),
		array($params->get('icon11_status'),$params->get('icon11_img'),$params->get('icon11_title'),$params->get('icon11_link'),$params->get('icon11_alt'),$params->get('icon11_target')),
		array($params->get('icon12_status'),$params->get('icon12_img'),$params->get('icon12_title'),$params->get('icon12_link'),$params->get('icon12_alt'),$params->get('icon12_target')),
		array($params->get('icon13_status'),$params->get('icon13_img'),$params->get('icon13_title'),$params->get('icon13_link'),$params->get('icon13_alt'),$params->get('icon13_target')),
		array($params->get('icon14_status'),$params->get('icon14_img'),$params->get('icon14_title'),$params->get('icon14_link'),$params->get('icon14_alt'),$params->get('icon14_target')),
		array($params->get('icon15_status'),$params->get('icon15_img'),$params->get('icon15_title'),$params->get('icon15_link'),$params->get('icon15_alt'),$params->get('icon15_target')),
		array($params->get('icon16_status'),$params->get('icon16_img'),$params->get('icon16_title'),$params->get('icon16_link'),$params->get('icon16_alt'),$params->get('icon16_target')),
		array($params->get('icon17_status'),$params->get('icon17_img'),$params->get('icon17_title'),$params->get('icon17_link'),$params->get('icon17_alt'),$params->get('icon17_target')),
		array($params->get('icon18_status'),$params->get('icon18_img'),$params->get('icon18_title'),$params->get('icon18_link'),$params->get('icon18_alt'),$params->get('icon18_target')),
		array($params->get('icon19_status'),$params->get('icon19_img'),$params->get('icon19_title'),$params->get('icon19_link'),$params->get('icon19_alt'),$params->get('icon19_target')),
		array($params->get('icon20_status'),$params->get('icon20_img'),$params->get('icon20_title'),$params->get('icon20_link'),$params->get('icon20_alt'),$params->get('icon20_target'))
	);

// set up all the globals
  $user 	= JFactory::getUser();
  $acl 		= JFactory::getACL();
  $document = JFactory::getDocument();
  
  $headerStyle 	= '';
  $siteLoc 		= JURI::base().'media/mod_ninja_simple_icon_menu';
  
  // Create a variable to store the visible status of the menu
  // Set the variable to 0 to mean the menu is not displayed. Then modifiy it if it is to be displayed.
  $menuVisibleCount = 0;
  // Loop through the list
  // We say less than 8 and start at 0 because that is how php handles arrays, the first element has an index of 0
  // We have 10 elements but one is in index 0 which means we stop the loop when the index is above 9.
  // Also this menu visible count variable is used to tell us how many items we have so we can size the invisible box accordingly
  for ($i=0; $i<20; $i++){
      // Menu params[i][0] = the first element (menu status) in the array record which matches the index i
      // Check that our status == 1 (visible) or == 2 (registered only) and we are not a guest. || = OR , && = AND
      // Also, for all the ones that are status 2 and we are registered, change them to status 1
      // This will save us having to do multiple tests later on. We can just test for  $menu_params[i][0] == 1 only
		// Following line changed by Juergen Buchberger
		if (($iconParams[$i][0] == 1) || (($iconParams[$i][0] == 2)&&($user->get('id')))){
			$menuVisibleCount ++;
			$iconParams[$i][0] = 1;
			}  
	}  
  
  switch ($icon_orientation) {
  	case '0':
     	$orien = 'horiz-icontop';
	 	$menuwidth = $icon_width + $icon_width; // insertion of menuwidth to avoid error notice by Juergen Buchberger
	 	break;
	case '1':
		$orien = 'horiz-iconbottom';
		$menuwidth = $icon_width + $icon_width; // insertion of menuwidth to avoid error notice by Juergen Buchberger
		break;
	case '2':
	  	$orien = 'vert';
	  	break;
	case '3':
		 $orien = 'vert-l';
		 break;
	case '4':
		 $orien = 'vert-r';
		 break;
	}  
	
	//Check if we have already loaded our css or not, and load it if needed and requested
		$mainStyleLoaded = false;
		
		if ($incCSS)	{
			foreach($document->_styleSheets as $key => $styleSheet) {
				if(stristr($key, 'nsimple_icons.css') !== false) 	{
					$mainStyleLoaded = true;				
				}
			}

		//link in the CSS if it hasn't been loaded yet
			if ($mainStyleLoaded === false)	{			
				$cssFile = $siteLoc.'/css/style.css';
				$document->addStyleSheet($cssFile);	
        
        		
				$headerStyle .= '.nsi-container div {margin-top: '.$icon_container_margin_top.'}';
				
				if ($icon_titles == 1) {
				    if (!empty($icon_title_color)) {
				        $headerStyle .='.nsi-container span {color:'.$icon_title_color.'}';
				    }
				    if (!empty($icon_title_fontsize)) {
				        $headerStyle .='.nsi-container span {font-size:'.$icon_title_fontsize.'}';
				    }
				}
      	if ($orien == 'vert-l' || $orien == 'vert-r') {
            $headerStyle .='.nsi-icon'.$orien.' span {line-height:'.$icon_height.'px}';
        }
        
				$document->addStyleDeclaration($headerStyle);
			} // if ($mainStyleLoaded === false)
		}//if ($incCSS)
?>
<div class="nsi-container nsi-icon<?php echo $orien; ?>">
   <div>
    <ul>                
       <?php /* loop through our menu items and display the ones we need to display */ 
          for ($i=0; $i<20; $i++){
              // icon params[i][0] = the first element (menu status) in the array record which matches the index i
              // Check that our status == 1 (visible) 
              if ($iconParams[$i][0] == 1) { ?>
               <li>
                  <a href="<?php echo $iconParams[$i][3]; ?>" target="<?php echo $iconParams[$i][5]; ?>" title="<?php /* The icon alt text is used here */ echo $iconParams[$i][4]; ?>">
                  		<?php if ($icon_titles == 1 && $orien == 'horiz-iconbottom') { ?>
                  		<span><?php echo $iconParams[$i][2] ?></span><br />
                  		<?php } ?>
                  		
                  		<?php if ($iconParams[$i][1] != "-1") { /* this needs to be improved */ ?>
	                  		<img src="<?php echo $siteLoc.'/images/'.$iconParams[$i][1]; ?>" alt="<?php echo $iconParams[$i][4]; ?>" height="<?php echo $icon_height; ?>" width="<?php echo $icon_width; ?>" />
	                  	<?php } ?>
	                  	<?php if ($orien == 'horiz-icontop' || $orien == 'vert') : ?><br /><?php endif; ?>
	                  	
	                  	<?php if ($icon_titles == 1 && $iconParams[$i][2] != '' && ($orien == 'horiz-icontop' || $orien =='vert' || $orien == 'vert-l' || $orien == 'vert-r')) { ?>
	                  	<span><?php echo $iconParams[$i][2] ?></span>
                   		<?php } ?>
                  </a>
                </li>
         <?php }} ?>
    </ul>
  </div>
</div>
