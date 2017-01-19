<?php
	include '../includes/database_functions.php';
?>
<script>
	$(document).foundation();
</script>
<div class="container">
	<div class="row">
		<div class="column medium-12">		
			<h2>Beveiliging</h2>
			<h4>Wachtwoord wijzigen</h4>
			<form action="handlers/Instellingen_wachtwoord_handler.php" method="POST">
				Oud wachtwoord:
				<input type="password" name="CurrentPass"><br>
				Nieuw wachtwoord:<input type="password" name="Password"><br>
				Herhaal nieuw wachtwoord:<input type="password" name="PasswordC"><br>
				<input type="submit" class="button" value="Opslaan" style="margin-bottom:10%;">
			</form>
			<hr>
			<h2>Informatie</h2>
			<h4>Software van derden</h4>
			<ul class="accordion" data-accordion data-allow-all-closed="true">
			  <li class="accordion-item" data-accordion-item>
			    <a href="#" class="accordion-title">Foundation</a>
			    <div class="accordion-content" data-tab-content>
			      Copyright (c) year copyright holders
				<br><br>
				Permission is hereby granted, free of charge, to any person obtaining a copy
				of this software and associated documentation files (the "Software"), to deal
				in the Software without restriction, including without limitation the rights
				to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
				copies of the Software, and to permit persons to whom the Software is
				furnished to do so, subject to the following conditions:
				<br><br>
				The above copyright notice and this permission notice shall be included in all
				copies or substantial portions of the Software.
				<br><br>
				THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
				IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
				FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
				AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
				LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
				OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
				SOFTWARE.
			    </div>
			  </li>
			  <li class="accordion-item" data-accordion-item>
			    <a href="#" class="accordion-title">JQuery</a>
			    <div class="accordion-content" data-tab-content>
			      	The JS Foundation supports numerous individual projects (each, a “Project” and together, the
					“Projects”). Contributions to individual projects are made pursuant to the license applicable to
					each such Project (with respect to each Project, the “Applicable License”). The technical
					governing body of each Project is free to choose, as its Applicable License with respect to
					contributions of code, the Apache License, Version 2.0 (available at
					http://www.apache.org/licenses/LICENSE-2.0).<br>
					If an alternative inbound or outbound license is required for compliance with the license for a
					leveraged open source project or is otherwise required to achieve the JS Foundation’s, or an
					individual Project’s, objectives, the Board of Directors of the JS Foundation (the “Board”) may
					approve the use of an alternative license for inbound or outbound contributions on an exception
					basis. Please email legal@js.foundation to obtain exception approval.
					The JS Foundation and its Projects seek to integrate and contribute back to other open source
					projects within the scope of driving widespread adoption and continued development of key
					JavaScript solutions and related technologies. Based on this design goal for the JS Foundation,
					the development community will:<br>
					• conform to all license requirements of the open source projects leveraged within the
					project; and<br>
					• operate to maximize opportunities for compatibility with other projects that might be
					leveraged in the project.
					Except as may be approved by the Board:<br>
					• All new code contributions to any Project shall be made under the Applicable License
					accompanied by either a JS Foundation CLA Signature available at
					https://js.foundation/CLA or a Developers Certificate of Origin (DCO, available at
					http://developercertificate.org/).<br>
					• All outbound code will be made available under the Applicable License.<br>
					• All documentation (including without limitation code that is intended as sample code)
					will be contributed to the Project and made available under the Applicable License or, if
					approved by the Project, Creative Commons Attribution 4.0 International License or
					under CC0.<br>
					Furthermore, on notice to the Projects, the Board may adopt and/or modify contribution policies
					for the contribution of code to any Project.<br>
					The technical governing body of each Project may provide for additional requirements with
					respect to contributions.<br>
					Except for (a) each member’s commitment to be bound by this Policy with respect to its or its
					employees’ authorized contributions to any Project and (b) any applicable contributor license
					agreement, if any, no license is granted by the member to its intellectual property, and none shall
					be implied by general membership in the JS Foundation.
					<br><br>
					As adopted by the Board of Directors on October, 17 2016
			    </div>
			  </li>
			  <li class="accordion-item" data-accordion-item>
			    <a href="#" class="accordion-title">Chart.js</a>
			    <div class="accordion-content" data-tab-content>
			      	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
					The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
					THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
			    </div>
			  </li>
			  <li class="accordion-item" data-accordion-item>
			    <a href="#" class="accordion-title">Material Icons</a>
			    <div class="accordion-content" data-tab-content>
			      Apache License<br>
                           Version 2.0, January 2004<br>
                        http://www.apache.org/licenses/<br>
					<br><br>
				   TERMS AND CONDITIONS FOR USE, REPRODUCTION, AND DISTRIBUTION
					<br><br>
				   1. Definitions.
					<br><br>
				      "License" shall mean the terms and conditions for use, reproduction,
				      and distribution as defined by Sections 1 through 9 of this document.
					<br><br>
				      "Licensor" shall mean the copyright owner or entity authorized by
				      the copyright owner that is granting the License.
					<br><br>
				      "Legal Entity" shall mean the union of the acting entity and all
				      other entities that control, are controlled by, or are under common
				      control with that entity. For the purposes of this definition,
				      "control" means (i) the power, direct or indirect, to cause the
				      direction or management of such entity, whether by contract or
				      otherwise, or (ii) ownership of fifty percent (50%) or more of the
				      outstanding shares, or (iii) beneficial ownership of such entity.
					<br><br>
				      "You" (or "Your") shall mean an individual or Legal Entity
				      exercising permissions granted by this License.
					<br><br>
				      "Source" form shall mean the preferred form for making modifications,
				      including but not limited to software source code, documentation
				      source, and configuration files.
					<br><br>
				      "Object" form shall mean any form resulting from mechanical
				      transformation or translation of a Source form, including but
				      not limited to compiled object code, generated documentation,
				      and conversions to other media types.
					<br><br>
				      "Work" shall mean the work of authorship, whether in Source or
				      Object form, made available under the License, as indicated by a
				      copyright notice that is included in or attached to the work
				      (an example is provided in the Appendix below).
					<br><br>
				      "Derivative Works" shall mean any work, whether in Source or Object
				      form, that is based on (or derived from) the Work and for which the
				      editorial revisions, annotations, elaborations, or other modifications
				      represent, as a whole, an original work of authorship. For the purposes
				      of this License, Derivative Works shall not include works that remain
				      separable from, or merely link (or bind by name) to the interfaces of,
				      the Work and Derivative Works thereof.
					<br><br>
				      "Contribution" shall mean any work of authorship, including
				      the original version of the Work and any modifications or additions
				      to that Work or Derivative Works thereof, that is intentionally
				      submitted to Licensor for inclusion in the Work by the copyright owner
				      or by an individual or Legal Entity authorized to submit on behalf of
				      the copyright owner. For the purposes of this definition, "submitted"
				      means any form of electronic, verbal, or written communication sent
				      to the Licensor or its representatives, including but not limited to
				      communication on electronic mailing lists, source code control systems,
				      and issue tracking systems that are managed by, or on behalf of, the
				      Licensor for the purpose of discussing and improving the Work, but
				      excluding communication that is conspicuously marked or otherwise
				      designated in writing by the copyright owner as "Not a Contribution."
					<br><br>
				      "Contributor" shall mean Licensor and any individual or Legal Entity
				      on behalf of whom a Contribution has been received by Licensor and
				      subsequently incorporated within the Work.
					<br><br>
				   2. Grant of Copyright License. Subject to the terms and conditions of
				      this License, each Contributor hereby grants to You a perpetual,
				      worldwide, non-exclusive, no-charge, royalty-free, irrevocable
				      copyright license to reproduce, prepare Derivative Works of,
				      publicly display, publicly perform, sublicense, and distribute the
				      Work and such Derivative Works in Source or Object form.
					<br><br>
				   3. Grant of Patent License. Subject to the terms and conditions of
				      this License, each Contributor hereby grants to You a perpetual,
				      worldwide, non-exclusive, no-charge, royalty-free, irrevocable
				      (except as stated in this section) patent license to make, have made,
				      use, offer to sell, sell, import, and otherwise transfer the Work,
				      where such license applies only to those patent claims licensable
				      by such Contributor that are necessarily infringed by their
				      Contribution(s) alone or by combination of their Contribution(s)
				      with the Work to which such Contribution(s) was submitted. If You
				      institute patent litigation against any entity (including a
				      cross-claim or counterclaim in a lawsuit) alleging that the Work
				      or a Contribution incorporated within the Work constitutes direct
				      or contributory patent infringement, then any patent licenses
				      granted to You under this License for that Work shall terminate
				      as of the date such litigation is filed.
					<br><br>
				   4. Redistribution. You may reproduce and distribute copies of the
				      Work or Derivative Works thereof in any medium, with or without
				      modifications, and in Source or Object form, provided that You
				      meet the following conditions:
					<br><br>
				      (a) You must give any other recipients of the Work or
				          Derivative Works a copy of this License; and
					<br><br>
				      (b) You must cause any modified files to carry prominent notices
				          stating that You changed the files; and
					<br><br>
				      (c) You must retain, in the Source form of any Derivative Works
				          that You distribute, all copyright, patent, trademark, and
				          attribution notices from the Source form of the Work,
				          excluding those notices that do not pertain to any part of
				          the Derivative Works; and
					<br><br>
				      (d) If the Work includes a "NOTICE" text file as part of its
				          distribution, then any Derivative Works that You distribute must
				          include a readable copy of the attribution notices contained
				          within such NOTICE file, excluding those notices that do not
				          pertain to any part of the Derivative Works, in at least one
				          of the following places: within a NOTICE text file distributed
				          as part of the Derivative Works; within the Source form or
				          documentation, if provided along with the Derivative Works; or,
				          within a display generated by the Derivative Works, if and
				          wherever such third-party notices normally appear. The contents
				          of the NOTICE file are for informational purposes only and
				          do not modify the License. You may add Your own attribution
				          notices within Derivative Works that You distribute, alongside
				          or as an addendum to the NOTICE text from the Work, provided
				          that such additional attribution notices cannot be construed
				          as modifying the License.
					<br><br>
				      You may add Your own copyright statement to Your modifications and
				      may provide additional or different license terms and conditions
				      for use, reproduction, or distribution of Your modifications, or
				      for any such Derivative Works as a whole, provided Your use,
				      reproduction, and distribution of the Work otherwise complies with
				      the conditions stated in this License.
					<br><br>
				   5. Submission of Contributions. Unless You explicitly state otherwise,
				      any Contribution intentionally submitted for inclusion in the Work
				      by You to the Licensor shall be under the terms and conditions of
				      this License, without any additional terms or conditions.
				      Notwithstanding the above, nothing herein shall supersede or modify
				      the terms of any separate license agreement you may have executed
				      with Licensor regarding such Contributions.
					<br><br>
				   6. Trademarks. This License does not grant permission to use the trade
				      names, trademarks, service marks, or product names of the Licensor,
				      except as required for reasonable and customary use in describing the
				      origin of the Work and reproducing the content of the NOTICE file.
					<br><br>
				   7. Disclaimer of Warranty. Unless required by applicable law or
				      agreed to in writing, Licensor provides the Work (and each
				      Contributor provides its Contributions) on an "AS IS" BASIS,
				      WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or
				      implied, including, without limitation, any warranties or conditions
				      of TITLE, NON-INFRINGEMENT, MERCHANTABILITY, or FITNESS FOR A
				      PARTICULAR PURPOSE. You are solely responsible for determining the
				      appropriateness of using or redistributing the Work and assume any
				      risks associated with Your exercise of permissions under this License.
					<br><br>
				   8. Limitation of Liability. In no event and under no legal theory,
				      whether in tort (including negligence), contract, or otherwise,
				      unless required by applicable law (such as deliberate and grossly
				      negligent acts) or agreed to in writing, shall any Contributor be
				      liable to You for damages, including any direct, indirect, special,
				      incidental, or consequential damages of any character arising as a
				      result of this License or out of the use or inability to use the
				      Work (including but not limited to damages for loss of goodwill,
				      work stoppage, computer failure or malfunction, or any and all
				      other commercial damages or losses), even if such Contributor
				      has been advised of the possibility of such damages.
					<br><br>
				   9. Accepting Warranty or Additional Liability. While redistributing
				      the Work or Derivative Works thereof, You may choose to offer,
				      and charge a fee for, acceptance of support, warranty, indemnity,
				      or other liability obligations and/or rights consistent with this
				      License. However, in accepting such obligations, You may act only
				      on Your own behalf and on Your sole responsibility, not on behalf
				      of any other Contributor, and only if You agree to indemnify,
				      defend, and hold each Contributor harmless for any liability
				      incurred by, or claims asserted against, such Contributor by reason
				      of your accepting any such warranty or additional liability.
					<br><br>
				   END OF TERMS AND CONDITIONS
					<br><br>
				   APPENDIX: How to apply the Apache License to your work.
					<br><br>
				      To apply the Apache License to your work, attach the following
				      boilerplate notice, with the fields enclosed by brackets "[]"
				      replaced with your own identifying information. (Don't include
				      the brackets!)  The text should be enclosed in the appropriate
				      comment syntax for the file format. We also recommend that a
				      file or class name and description of purpose be included on the
				      same "printed page" as the copyright notice for easier
				      identification within third-party archives.
					<br><br>
				   Copyright [yyyy] [name of copyright owner]
					<br><br>
				   Licensed under the Apache License, Version 2.0 (the "License");
				   you may not use this file except in compliance with the License.
				   You may obtain a copy of the License at
					<br><br>
				       http://www.apache.org/licenses/LICENSE-2.0
					<br><br>
				   Unless required by applicable law or agreed to in writing, software
				   distributed under the License is distributed on an "AS IS" BASIS,
				   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
				   See the License for the specific language governing permissions and
				   limitations under the License.
			    </div>
			  </li>
			</ul>
			<hr>
			<h4>Versie</h4>
			<h6>Donkey Kong V1.0</h6>
			<h7>Gemaakt met <b>&#10084;</b> door: <i>Allard de Beer, Dion Rats, Giovanni Winkels, Jason Meyer & Mick Tuit</i></h7>
		</div>
	</div>
</div>