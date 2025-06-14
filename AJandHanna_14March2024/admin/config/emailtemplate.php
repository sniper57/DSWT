<?php 
function emailtemplatecontentonly($title,$htmlcontent){
    return '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>'.$title.'</title>
</head>
<body yahoo="" bgcolor="#ffffff">
<table width="100%" bgcolor="#ffffff" border="0" cellpadding="10" cellspacing="0">
<tbody><tr>
  <td>
    <!--[if (gte mso 9)|(IE)]>
      <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
    <![endif]-->
    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
			<tbody><tr>
				<td valign="top" mc:edit="headerBrand" id="templateContainerHeader">

					<p style="text-align:center;margin:0;padding:0;">
						
					</p>

				</td>
			</tr>
      <tr>
				<td align="center" valign="top">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerImageCurve" style="min-height:15px;">
						<tbody><tr>
							<td valign="top" class="bodyContentImageFull" mc:edit="body_content_01">
                <p style="text-align:center;margin:0;padding:0;">
      						<!-- <img src="#" style="display:block;"> -->
      					</p>
							</td>
						</tr>
					</tbody></table>
				</td>
			</tr>
      <tr>
				<td align="center" valign="top">
						<!-- BEGIN BODY // -->
						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerMiddle">
							<tbody><tr>
								<td valign="top" class="bodyContent" mc:edit="body_content">
									<p>'.$htmlcontent.'</p>
								</td>
							</tr>
						</tbody></table>
						<!-- // END BODY -->
					</td>
			</tr>
      <tr>
				<td align="right" valign="top">
						<!-- BEGIN BODY // -->
						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerMiddle">
							<tbody><tr>
								<td valign="top" class="bodyContentCenter" mc:edit="body_content_centered">
								<div style="width: 300px; text-align:left">
								<b><small>ePayslip Administrator</small></b><br>
								<p style="font-size: x-small; text-align:left">This is an auto-generated email. Please do not reply.</p>
								</td>
							</tr>
						</tbody></table>
						<!-- // END BODY -->
					</td>
			</tr>
			<tr>
				<td align="center" valign="top">
						<!-- BEGIN BODY // -->
						<hr/>
							<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerMiddleBtm">
									<tbody><tr align="top">
											<td valign="top" class="bodyContentImage">
												<table border="0" cellpadding="0" cellspacing="0" valign="top">
													<tbody>
													<tr>
														
														<td align="left" valign="top" mc:edit="footer_sig" style="margin:0;padding-top:10px;line-height:1;">
															<h4><strong>CONFIDENTIALITY NOTICE: </strong></h4><br>
															<small>The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.</small>
														</td>
													</tr>
												</tbody></table>
											</td>
									</tr>
							</tbody></table>
							<!-- // END BODY -->
					</td>
			</tr>

    </tbody></table>
    <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
    </table>
    <![endif]-->
    </td>
  </tr>
</tbody></table>
<style type="text/css">
  /* /\/\/\/\/\/\/\/\/ CLIENT-SPECIFIC STYLES /\/\/\/\/\/\/\/\/ */
  #outlook a{padding:0;} /* Force Outlook to provide a "view in browser" message */
  .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
  .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing */
  body, table, td, p, a, li, blockquote{-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
  table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up */
  td ul li {
    font-size: 16px;
  }
  /* /\/\/\/\/\/\/\/\/ RESET STYLES /\/\/\/\/\/\/\/\/ */
  body{margin:0; padding:0;}
  img{
    max-width:100%;
    border:0;
    line-height:100%;
    outline:none;
    text-decoration:none;
  }
  table{border-collapse:collapse !important;}
  .content {width: 100%; max-width: 600px;}
  .content img { height: auto; min-height: 1px; }

  #bodyTable{margin:0; padding:0; width:100% !important;}
  #bodyCell{margin:0; padding:0;}
  #bodyCellFooter{margin:0; padding:0; width:100% !important;padding-top:39px;padding-bottom:15px;}
  body {margin: 0; padding: 0; min-width: 100%!important;}

  #templateContainerHeader{
    font-size: 14px;
    padding-top:2.429em;
    padding-bottom:0.929em;
  }
  #templateContainerFootBrd{
    border-bottom:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 0 0 4px 4px;
    background-clip: padding-box;
    border-spacing: 0;
    height: 10px;
    width:100% !important;
  }
  #templateContainer{
    border-top:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 4px 4px 0 0 ;
    background-clip: padding-box;
    border-spacing: 0;
  }
  #templateContainerMiddle {
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
  }
  #templateContainerMiddleBtm {
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-bottom:1px solid #e2e2e2;
    border-radius: 0 0 4px 4px;
    background-clip: padding-box;
    border-spacing: 0;
  }

  /**
  * @tab Page
  * @section heading 1
  * @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
  * @style heading 1
  */
  h1{
     color:#2e2e2e;
    display:block;
     font-family:Helvetica;
     font-size:26px;
     line-height:1.385em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 2
  * @tip Set the styling for all second-level headings in your emails.
  * @style heading 2
  */
  h2{
     color:#2e2e2e;
    display:block;
     font-family:Helvetica;
     font-size:22px;
     line-height:1.455em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 3
  * @tip Set the styling for all third-level headings in your emails.
  * @style heading 3
  */
  h3{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:18px;
     line-height:1.444em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 4
  * @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
  * @style heading 4
  */
  h4{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:14px;
     line-height:1.571em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }


  h5{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:13px;
     line-height:1.538em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }


  h6{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:12px;
     line-height:2.000em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  p {
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:16px;
     line-height:1.500em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
    text-align:left;
  }

  .unSubContent a:visited { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:focus   { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:hover   { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:link   { color: #a1a1a1 ; text-decoration:underline; font-weight:normal;}
  .unSubContent a .yshortcuts   { color: #a1a1a1 ; text-decoration:underline; font-weight:normal;}

  .unSubContent h6 {
    color: #a1a1a1;
    font-size: 12px;
    line-height: 1.5em;
    margin-bottom: 0;
  }

  .bodyContent{
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:3.143em;
    padding-right:3.5em;
    padding-left:3.5em;
    padding-bottom:0.714em;
     text-align:left;
  }
  .bodyContentCenter {
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:0em;
    padding-right:3.5em;
    padding-left:3.5em;
    padding-bottom:3.0em;
    text-align:center;
  }
  .bodyContentCenter p {
    margin-bottom: 0;
    text-align: center;
  }
  .bodyContentCenter a.blue-btn {
    margin-top: 0;
  }
  .bodyContentImage {
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:0;
    padding-right:3.571em;
    padding-left:3.571em;
    padding-bottom:2em;
    text-align:left;
  }

  .bodyContentImage h4 {
    color: #4E4E4E;
    font-size: 13px;
    line-height: 1.154em;
    font-weight:normal;
    margin-bottom: 0;
  }
  .bodyContentImage h5 {
    color: #828282;
    font-size: 12px;
    line-height: 1.667em;
    margin-bottom: 0;
  }

  /**
  * @tab Body
  * @section body link
  * @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.
  */
  a:visited { color: #3386e4; text-decoration:none;}
  a:focus   { color: #3386e4; text-decoration:none;}
  a:hover   { color: #3386e4; text-decoration:none;}
  a:link   { color: #3386e4 ; text-decoration:none;}
  a .yshortcuts   { color: #3386e4 ; text-decoration:none;}

  .bodyContent img{
    height:auto;
    max-width:498px;
  }

  .footerContent{
    color:#808080;
    font-family:Helvetica;
    font-size:10px;
    line-height:150%;
    padding-top:2.000em;
    padding-right:2.000em;
    padding-bottom:2.000em;
    padding-left:2.000em;
    text-align:left;
  }

  /**
  * @tab Footer
  * @section footer link
  * @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.
  */
  .footerContent a:link, .footerContent a:visited, /* Yahoo! Mail Override */ .footerContent a .yshortcuts, .footerContent a span /* Yahoo! Mail Override */{
     color:#606060;
     font-weight:normal;
     text-decoration:underline;
  }

  /**
  * @tab Footer
  * @section footer link
  * @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.
  */
  #templateContainerImageFull { border-left:1px solid #e2e2e2; border-right:1px solid #e2e2e2; }
  #templateContainerImageCurve {
    border-top:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 3px 3px 0px 0px;
    background-clip: padding-box;
    border-collapse: separate !important;
    border-spacing: 0;
  }
  #templateContainerImageCurve img {
    border-radius: 3px 3px 0px 0px;
    background-clip: padding-box;
  }
  /*boom*/
  .bodyContentImageFull p { font-size:0 !important; margin-bottom: 0 !important; }
  .brdBottomPadd { border-bottom: 1px solid #f0f0f0; }
  .brdBottomPadd .bodyContent { padding-bottom: 2.286em; }
  a.blue-btn {
    background: #5098ea;
    display: inline-block;
    color: #FFFFFF;
    border-top:10px solid #5098ea;
    border-bottom:10px solid #5098ea;
    border-bottom:10px solid #5098ea;
    border-left:20px solid #5098ea;
    border-right:20px solid #5098ea;
    text-decoration: none;
    font-size: 14px;
    margin-top: 1.0em;
    border-radius: 3px 3px 3px 3px;
    background-clip: padding-box;
  }


  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
    body[yahoo] .hide {display: none!important;}
    body[yahoo] .buttonwrapper {background-color: transparent!important;}
    body[yahoo] .button {padding: 0px!important;}
    body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
    body[yahoo] .unsubscribe { font-size: 14px; display: block; margin-top: 0.714em; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important;}
  }
  /*@media only screen and (min-device-width: 601px) {
    .content {width: 600px !important;}
  }*/
  @media only screen and (max-width: 480px) {
    h1 {
      font-size:34px !important;
    }
    h2{
      font-size:30px !important;
    }
    h3{
      font-size:24px !important;
    }
    h4{
      font-size:18px !important;
    }
    h5{
      font-size:16px !important;
    }
    h6{
      font-size:14px !important;
    }
    p {
      font-size: 18px !important;
    }
    .brdBottomPadd .bodyContent { padding-bottom: 2.286em !important; }
    .bodyContent {
      padding: 6% 5% 1% 6% !important;
    }
    .bodyContent img {
      max-width: 100% !important;
    }
    .bodyContentImage {
      padding: 3% 6% 6% 6% !important;
    }
    .bodyContentImage img {
      max-width: 100% !important;
    }
    .bodyContentImage h4 {
      font-size: 16px !important;
    }
    .bodyContentImage h5 {
      font-size: 15px !important;
      margin-top:0;
    }
    td[class="bodyContentCenter"] {
      padding: 6% 6% 6% 6% !important;
    }
  }
  .ii a[href] {color: inherit !important;}
  span > a, span > a[href] {color: inherit !important;}
  a > span, .ii a[href] > span {text-decoration: inherit !important;}
</style>


</body></html>
';
}

function emailtemplatetitlecontent($title,$htmlcontent){
    return '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>'.$title.'</title>
</head>
<body yahoo="" bgcolor="#ffffff">
<table width="100%" bgcolor="#ffffff" border="0" cellpadding="10" cellspacing="0">
<tbody><tr>
  <td>
    <!--[if (gte mso 9)|(IE)]>
      <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
    <![endif]-->
    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
			<tbody><tr>
				<td valign="top" mc:edit="headerBrand" id="templateContainerHeader">

					<p style="text-align:center;margin:0;padding:0;">
						
					</p>

				</td>
			</tr>
      <tr>
				<td align="center" valign="top">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerImageCurve" style="min-height:15px;">
						<tbody><tr>
							<td valign="top" class="bodyContentImageFull" mc:edit="body_content_01">
                <p style="text-align:center;margin:0;padding:0;">
      						<!-- <img src="#" style="display:block;"> -->
      					</p>
							</td>
						</tr>
					</tbody></table>
				</td>
			</tr>
      <tr>
				<td align="center" valign="top">
						<!-- BEGIN BODY // -->
						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerMiddle">
							<tbody><tr>
								<td valign="top" class="bodyContent" mc:edit="body_content">
								<h2>'.$title.'</h3><br>
									<p>'.$htmlcontent.'</p>
								</td>
							</tr>
						</tbody></table>
						<!-- // END BODY -->
					</td>
			</tr>
      <tr>
				<td align="right" valign="top">
						<!-- BEGIN BODY // -->
						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerMiddle">
							<tbody><tr>
								<td valign="top" class="bodyContentCenter" mc:edit="body_content_centered">
								<div style="width: 300px; text-align:left">
								<b><small>ePayslip Administrator</small></b><br>
								<p style="font-size: x-small; text-align:left">This is an auto-generated email. Please do not reply.</p>
								</td>
							</tr>
						</tbody></table>
						<!-- // END BODY -->
					</td>
			</tr>
			<tr>
				<td align="center" valign="top">
						<!-- BEGIN BODY // -->
						<hr/>
							<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerMiddleBtm">
									<tbody><tr align="top">
											<td valign="top" class="bodyContentImage">
												<table border="0" cellpadding="0" cellspacing="0" valign="top">
													<tbody>
													<tr>
														
														<td align="left" valign="top" mc:edit="footer_sig" style="margin:0;padding-top:10px;line-height:1;">
															<h4><strong>CONFIDENTIALITY NOTICE: </strong></h4><br>
															<small>The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.</small>
														</td>
													</tr>
												</tbody></table>
											</td>
									</tr>
							</tbody></table>
							<!-- // END BODY -->
					</td>
			</tr>

    </tbody></table>
    <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
    </table>
    <![endif]-->
    </td>
  </tr>
</tbody></table>
<style type="text/css">
  /* /\/\/\/\/\/\/\/\/ CLIENT-SPECIFIC STYLES /\/\/\/\/\/\/\/\/ */
  #outlook a{padding:0;} /* Force Outlook to provide a "view in browser" message */
  .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
  .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing */
  body, table, td, p, a, li, blockquote{-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
  table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up */
  td ul li {
    font-size: 16px;
  }
  /* /\/\/\/\/\/\/\/\/ RESET STYLES /\/\/\/\/\/\/\/\/ */
  body{margin:0; padding:0;}
  img{
    max-width:100%;
    border:0;
    line-height:100%;
    outline:none;
    text-decoration:none;
  }
  table{border-collapse:collapse !important;}
  .content {width: 100%; max-width: 600px;}
  .content img { height: auto; min-height: 1px; }

  #bodyTable{margin:0; padding:0; width:100% !important;}
  #bodyCell{margin:0; padding:0;}
  #bodyCellFooter{margin:0; padding:0; width:100% !important;padding-top:39px;padding-bottom:15px;}
  body {margin: 0; padding: 0; min-width: 100%!important;}

  #templateContainerHeader{
    font-size: 14px;
    padding-top:2.429em;
    padding-bottom:0.929em;
  }
  #templateContainerFootBrd{
    border-bottom:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 0 0 4px 4px;
    background-clip: padding-box;
    border-spacing: 0;
    height: 10px;
    width:100% !important;
  }
  #templateContainer{
    border-top:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 4px 4px 0 0 ;
    background-clip: padding-box;
    border-spacing: 0;
  }
  #templateContainerMiddle {
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
  }
  #templateContainerMiddleBtm {
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-bottom:1px solid #e2e2e2;
    border-radius: 0 0 4px 4px;
    background-clip: padding-box;
    border-spacing: 0;
  }

  /**
  * @tab Page
  * @section heading 1
  * @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
  * @style heading 1
  */
  h1{
     color:#2e2e2e;
    display:block;
     font-family:Helvetica;
     font-size:26px;
     line-height:1.385em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 2
  * @tip Set the styling for all second-level headings in your emails.
  * @style heading 2
  */
  h2{
     color:#2e2e2e;
    display:block;
     font-family:Helvetica;
     font-size:22px;
     line-height:1.455em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 3
  * @tip Set the styling for all third-level headings in your emails.
  * @style heading 3
  */
  h3{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:18px;
     line-height:1.444em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 4
  * @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
  * @style heading 4
  */
  h4{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:14px;
     line-height:1.571em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }


  h5{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:13px;
     line-height:1.538em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }


  h6{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:12px;
     line-height:2.000em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  p {
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:16px;
     line-height:1.500em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
    text-align:left;
  }

  .unSubContent a:visited { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:focus   { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:hover   { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:link   { color: #a1a1a1 ; text-decoration:underline; font-weight:normal;}
  .unSubContent a .yshortcuts   { color: #a1a1a1 ; text-decoration:underline; font-weight:normal;}

  .unSubContent h6 {
    color: #a1a1a1;
    font-size: 12px;
    line-height: 1.5em;
    margin-bottom: 0;
  }

  .bodyContent{
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:3.143em;
    padding-right:3.5em;
    padding-left:3.5em;
    padding-bottom:0.714em;
     text-align:left;
  }
  .bodyContentCenter {
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:0em;
    padding-right:3.5em;
    padding-left:3.5em;
    padding-bottom:3.0em;
    text-align:center;
  }
  .bodyContentCenter p {
    margin-bottom: 0;
    text-align: center;
  }
  .bodyContentCenter a.blue-btn {
    margin-top: 0;
  }
  .bodyContentImage {
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:0;
    padding-right:3.571em;
    padding-left:3.571em;
    padding-bottom:2em;
    text-align:left;
  }

  .bodyContentImage h4 {
    color: #4E4E4E;
    font-size: 13px;
    line-height: 1.154em;
    font-weight:normal;
    margin-bottom: 0;
  }
  .bodyContentImage h5 {
    color: #828282;
    font-size: 12px;
    line-height: 1.667em;
    margin-bottom: 0;
  }

  /**
  * @tab Body
  * @section body link
  * @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.
  */
  a:visited { color: #3386e4; text-decoration:none;}
  a:focus   { color: #3386e4; text-decoration:none;}
  a:hover   { color: #3386e4; text-decoration:none;}
  a:link   { color: #3386e4 ; text-decoration:none;}
  a .yshortcuts   { color: #3386e4 ; text-decoration:none;}

  .bodyContent img{
    height:auto;
    max-width:498px;
  }

  .footerContent{
    color:#808080;
    font-family:Helvetica;
    font-size:10px;
    line-height:150%;
    padding-top:2.000em;
    padding-right:2.000em;
    padding-bottom:2.000em;
    padding-left:2.000em;
    text-align:left;
  }

  /**
  * @tab Footer
  * @section footer link
  * @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.
  */
  .footerContent a:link, .footerContent a:visited, /* Yahoo! Mail Override */ .footerContent a .yshortcuts, .footerContent a span /* Yahoo! Mail Override */{
     color:#606060;
     font-weight:normal;
     text-decoration:underline;
  }

  /**
  * @tab Footer
  * @section footer link
  * @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.
  */
  #templateContainerImageFull { border-left:1px solid #e2e2e2; border-right:1px solid #e2e2e2; }
  #templateContainerImageCurve {
    border-top:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 3px 3px 0px 0px;
    background-clip: padding-box;
    border-collapse: separate !important;
    border-spacing: 0;
  }
  #templateContainerImageCurve img {
    border-radius: 3px 3px 0px 0px;
    background-clip: padding-box;
  }
  /*boom*/
  .bodyContentImageFull p { font-size:0 !important; margin-bottom: 0 !important; }
  .brdBottomPadd { border-bottom: 1px solid #f0f0f0; }
  .brdBottomPadd .bodyContent { padding-bottom: 2.286em; }
  a.blue-btn {
    background: #5098ea;
    display: inline-block;
    color: #FFFFFF;
    border-top:10px solid #5098ea;
    border-bottom:10px solid #5098ea;
    border-bottom:10px solid #5098ea;
    border-left:20px solid #5098ea;
    border-right:20px solid #5098ea;
    text-decoration: none;
    font-size: 14px;
    margin-top: 1.0em;
    border-radius: 3px 3px 3px 3px;
    background-clip: padding-box;
  }


  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
    body[yahoo] .hide {display: none!important;}
    body[yahoo] .buttonwrapper {background-color: transparent!important;}
    body[yahoo] .button {padding: 0px!important;}
    body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
    body[yahoo] .unsubscribe { font-size: 14px; display: block; margin-top: 0.714em; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important;}
  }
  /*@media only screen and (min-device-width: 601px) {
    .content {width: 600px !important;}
  }*/
  @media only screen and (max-width: 480px) {
    h1 {
      font-size:34px !important;
    }
    h2{
      font-size:30px !important;
    }
    h3{
      font-size:24px !important;
    }
    h4{
      font-size:18px !important;
    }
    h5{
      font-size:16px !important;
    }
    h6{
      font-size:14px !important;
    }
    p {
      font-size: 18px !important;
    }
    .brdBottomPadd .bodyContent { padding-bottom: 2.286em !important; }
    .bodyContent {
      padding: 6% 5% 1% 6% !important;
    }
    .bodyContent img {
      max-width: 100% !important;
    }
    .bodyContentImage {
      padding: 3% 6% 6% 6% !important;
    }
    .bodyContentImage img {
      max-width: 100% !important;
    }
    .bodyContentImage h4 {
      font-size: 16px !important;
    }
    .bodyContentImage h5 {
      font-size: 15px !important;
      margin-top:0;
    }
    td[class="bodyContentCenter"] {
      padding: 6% 6% 6% 6% !important;
    }
  }
  .ii a[href] {color: inherit !important;}
  span > a, span > a[href] {color: inherit !important;}
  a > span, .ii a[href] > span {text-decoration: inherit !important;}
</style>


</body></html>';
}

function emailtemplate($sendername,$title,$htmlcontent,$link,$linktitle){
    return '

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>'.$title.'</title>
</head>

<body yahoo bgcolor="#ffffff">
<table width="100%" bgcolor="#ffffff" border="0" cellpadding="10" cellspacing="0">
<tr>
  <td>
    <!--[if (gte mso 9)|(IE)]>
      <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
    <![endif]-->
    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td valign="top" mc:edit="headerBrand" id="templateContainerHeader">

					<p style="text-align:center;margin:0;padding:0;">
						
					</p>

				</td>
			</tr>
      <tr>
				<td align="center" valign="top">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerImageCurve" style="min-height:15px;">
						<tr>
							<td valign="top" class="bodyContentImageFull" mc:edit="body_content_01">
                <p style="text-align:center;margin:0;padding:0;">
      						<!-- <img src="#" style="display:block;" /> -->
      					</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
      <tr>
				<td align="center" valign="top">
						<!-- BEGIN BODY // -->
						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerMiddle">
							<tr>
								<td valign="top" class="bodyContent" mc:edit="body_content">
                  <h3>'.$sendername.'</h3>
									<h2><strong>'.$title.'</strong></h2>
									<p>'.$htmlcontent.'</p>
								</td>
							</tr>
						</table>
						<!-- // END BODY -->
					</td>
			</tr>
      <!-- <tr>
				<td align="center" valign="top">
						
						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerMiddle">
							<tr>
								<td valign="top" align="center" class="bodyContentCenter" mc:edit="body_content_centered">
                  <a class="blue-btn" href="www.'.$link.'"><strong>'.$linktitle.'</strong></a>
								</td>
							</tr>
						</table>
						
					</td>
			</tr> -->
			 <tr>
				<td align="right" valign="top">
						<!-- BEGIN BODY // -->
						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerMiddle">
							<tbody><tr>
								<td valign="top" class="bodyContentCenter" mc:edit="body_content_centered">
								<div style="width: 300px; text-align:left">
								<b><small>The Wedding Day Story Team</small></b><br>
								<p style="font-size: x-small; text-align:left">This is an auto-generated email. Please do not reply.</p>
								</td>
							</tr>
						</tbody></table>
						<!-- // END BODY -->
					</td>
			</tr>
			
			<tr>
				<td align="center" valign="top">
						<!-- BEGIN BODY // -->
						<hr/>
							<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerMiddleBtm">
									<tbody><tr align="top">
											<td valign="top" class="bodyContentImage">
												<table border="0" cellpadding="0" cellspacing="0" valign="top">
													<tbody>
													<tr>
														
														<td align="left" valign="top" mc:edit="footer_sig" style="margin:0;padding-top:10px;line-height:1;">
															<h4><strong>CONFIDENTIALITY NOTICE: </strong></h4><br>
															<small>The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please report this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.</small>
														</td>
													</tr>
												</tbody></table>
											</td>
									</tr>
							</tbody></table>
							<!-- // END BODY -->
					</td>
			</tr>

    </table>
    <!--[if (gte mso 9)|(IE)]>
          </td>
        </tr>
    </table>
    <![endif]-->
    </td>
  </tr>
</table>
<style type="text/css">
  /* /\/\/\/\/\/\/\/\/ CLIENT-SPECIFIC STYLES /\/\/\/\/\/\/\/\/ */
  #outlook a{padding:0;} /* Force Outlook to provide a "view in browser" message */
  .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
  .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing */
  body, table, td, p, a, li, blockquote{-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
  table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up */
  td ul li {
    font-size: 16px;
  }
  /* /\/\/\/\/\/\/\/\/ RESET STYLES /\/\/\/\/\/\/\/\/ */
  body{margin:0; padding:0;}
  img{
    max-width:100%;
    border:0;
    line-height:100%;
    outline:none;
    text-decoration:none;
  }
  table{border-collapse:collapse !important;}
  .content {width: 100%; max-width: 600px;}
  .content img { height: auto; min-height: 1px; }

  #bodyTable{margin:0; padding:0; width:100% !important;}
  #bodyCell{margin:0; padding:0;}
  #bodyCellFooter{margin:0; padding:0; width:100% !important;padding-top:39px;padding-bottom:15px;}
  body {margin: 0; padding: 0; min-width: 100%!important;}

  #templateContainerHeader{
    font-size: 14px;
    padding-top:2.429em;
    padding-bottom:0.929em;
  }
  #templateContainerFootBrd{
    border-bottom:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 0 0 4px 4px;
    background-clip: padding-box;
    border-spacing: 0;
    height: 10px;
    width:100% !important;
  }
  #templateContainer{
    border-top:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 4px 4px 0 0 ;
    background-clip: padding-box;
    border-spacing: 0;
  }
  #templateContainerMiddle {
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
  }
  #templateContainerMiddleBtm {
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-bottom:1px solid #e2e2e2;
    border-radius: 0 0 4px 4px;
    background-clip: padding-box;
    border-spacing: 0;
  }

  /**
  * @tab Page
  * @section heading 1
  * @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
  * @style heading 1
  */
  h1{
     color:#2e2e2e;
    display:block;
     font-family:Helvetica;
     font-size:26px;
     line-height:1.385em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 2
  * @tip Set the styling for all second-level headings in your emails.
  * @style heading 2
  */
  h2{
     color:#2e2e2e;
    display:block;
     font-family:Helvetica;
     font-size:22px;
     line-height:1.455em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 3
  * @tip Set the styling for all third-level headings in your emails.
  * @style heading 3
  */
  h3{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:18px;
     line-height:1.444em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 4
  * @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
  * @style heading 4
  */
  h4{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:14px;
     line-height:1.571em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }


  h5{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:13px;
     line-height:1.538em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }


  h6{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:12px;
     line-height:2.000em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  p {
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:16px;
     line-height:1.500em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
    text-align:left;
  }

  .unSubContent a:visited { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:focus   { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:hover   { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:link   { color: #a1a1a1 ; text-decoration:underline; font-weight:normal;}
  .unSubContent a .yshortcuts   { color: #a1a1a1 ; text-decoration:underline; font-weight:normal;}

  .unSubContent h6 {
    color: #a1a1a1;
    font-size: 12px;
    line-height: 1.5em;
    margin-bottom: 0;
  }

  .bodyContent{
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:3.143em;
    padding-right:3.5em;
    padding-left:3.5em;
    padding-bottom:0.714em;
     text-align:left;
  }
  .bodyContentCenter {
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:0em;
    padding-right:3.5em;
    padding-left:3.5em;
    padding-bottom:3.0em;
    text-align:center;
  }
  .bodyContentCenter p {
    margin-bottom: 0;
    text-align: center;
  }
  .bodyContentCenter a.blue-btn {
    margin-top: 0;
  }
  .bodyContentImage {
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:0;
    padding-right:3.571em;
    padding-left:3.571em;
    padding-bottom:2em;
    text-align:left;
  }

  .bodyContentImage h4 {
    color: #4E4E4E;
    font-size: 13px;
    line-height: 1.154em;
    font-weight:normal;
    margin-bottom: 0;
  }
  .bodyContentImage h5 {
    color: #828282;
    font-size: 12px;
    line-height: 1.667em;
    margin-bottom: 0;
  }

  /**
  * @tab Body
  * @section body link
  * @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.
  */
  a:visited { color: #3386e4; text-decoration:none;}
  a:focus   { color: #3386e4; text-decoration:none;}
  a:hover   { color: #3386e4; text-decoration:none;}
  a:link   { color: #3386e4 ; text-decoration:none;}
  a .yshortcuts   { color: #3386e4 ; text-decoration:none;}

  .bodyContent img{
    height:auto;
    max-width:498px;
  }

  .footerContent{
    color:#808080;
    font-family:Helvetica;
    font-size:10px;
    line-height:150%;
    padding-top:2.000em;
    padding-right:2.000em;
    padding-bottom:2.000em;
    padding-left:2.000em;
    text-align:left;
  }

  /**
  * @tab Footer
  * @section footer link
  * @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.
  */
  .footerContent a:link, .footerContent a:visited, /* Yahoo! Mail Override */ .footerContent a .yshortcuts, .footerContent a span /* Yahoo! Mail Override */{
     color:#606060;
     font-weight:normal;
     text-decoration:underline;
  }

  /**
  * @tab Footer
  * @section footer link
  * @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.
  */
  #templateContainerImageFull { border-left:1px solid #e2e2e2; border-right:1px solid #e2e2e2; }
  #templateContainerImageCurve {
    border-top:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 3px 3px 0px 0px;
    background-clip: padding-box;
    border-collapse: separate !important;
    border-spacing: 0;
  }
  #templateContainerImageCurve img {
    border-radius: 3px 3px 0px 0px;
    background-clip: padding-box;
  }
  /*boom*/
  .bodyContentImageFull p { font-size:0 !important; margin-bottom: 0 !important; }
  .brdBottomPadd { border-bottom: 1px solid #f0f0f0; }
  .brdBottomPadd .bodyContent { padding-bottom: 2.286em; }
  a.blue-btn {
    background: #5098ea;
    display: inline-block;
    color: #FFFFFF;
    border-top:10px solid #5098ea;
    border-bottom:10px solid #5098ea;
    border-bottom:10px solid #5098ea;
    border-left:20px solid #5098ea;
    border-right:20px solid #5098ea;
    text-decoration: none;
    font-size: 14px;
    margin-top: 1.0em;
    border-radius: 3px 3px 3px 3px;
    background-clip: padding-box;
  }


  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
    body[yahoo] .hide {display: none!important;}
    body[yahoo] .buttonwrapper {background-color: transparent!important;}
    body[yahoo] .button {padding: 0px!important;}
    body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
    body[yahoo] .unsubscribe { font-size: 14px; display: block; margin-top: 0.714em; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important;}
  }
  /*@media only screen and (min-device-width: 601px) {
    .content {width: 600px !important;}
  }*/
  @media only screen and (max-width: 480px) {
    h1 {
      font-size:34px !important;
    }
    h2{
      font-size:30px !important;
    }
    h3{
      font-size:24px !important;
    }
    h4{
      font-size:18px !important;
    }
    h5{
      font-size:16px !important;
    }
    h6{
      font-size:14px !important;
    }
    p {
      font-size: 18px !important;
    }
    .brdBottomPadd .bodyContent { padding-bottom: 2.286em !important; }
    .bodyContent {
      padding: 6% 5% 1% 6% !important;
    }
    .bodyContent img {
      max-width: 100% !important;
    }
    .bodyContentImage {
      padding: 3% 6% 6% 6% !important;
    }
    .bodyContentImage img {
      max-width: 100% !important;
    }
    .bodyContentImage h4 {
      font-size: 16px !important;
    }
    .bodyContentImage h5 {
      font-size: 15px !important;
      margin-top:0;
    }
    td[class="bodyContentCenter"] {
      padding: 6% 6% 6% 6% !important;
    }
  }
  .ii a[href] {color: inherit !important;}
  span > a, span > a[href] {color: inherit !important;}
  a > span, .ii a[href] > span {text-decoration: inherit !important;}
</style>
</body>
</html>
';
}


?>
