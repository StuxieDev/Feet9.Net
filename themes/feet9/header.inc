<table class="headbox">
	<tr>
		<td colspan="4" id="big-logo">
			<a class="vis-desktop" href="//feet9.net/post/list"><img alt="logo" src="//feet9.net/themes/feet9/feet9_logo_top.png" style="height: 104px;"/></a>
		</td>
	</tr>

	<tr>
		<form action='/post/list' method='GET' id="barbot">
			<td id="nav-toggle">
				<a style="font-size: 2em;" onclick="toggleNav();">&nbsp;Sidebar&nbsp;</a>
			</td>
			<td id="mini-logo">
				<a class="vis-mobile" href="//feet9.net/post/list"><img alt="logo" src="//feet9.net/themes/feet9/feet9_logo_top.png" style="height: 34px;"/></a>
			</td>
			<td>
				<input name='search' size="45" type='text' placeholder='Search' autocomplete='off' class='autocomplete_tags' value="<?=$query;?>"/>
			</td>
			<td width="100">
				<input type='submit' value='Find' id="submit" style="border: 1px solid #888; height: 34px; border-radius: 2px; background: #EEE;"/>
			</td>
		</form>
	</tr>

	<tr>
		<td colspan="4">
			<div id="menuh-container">
				<div id="menuh">
					<ul>
						<li><a class="menu top_parent" href="//feet9.net">Home</a></li>
					</ul>
					<ul>
						<li>
							<a href="//feet9.net/post/list" class="top_parent">Main &#9660;</a>
							<ul>
								<li><a href="//feet9.net/post/list" class="sub_option">Posts</a></li>
								<li><a href="//feet9.net/comment/list" class="sub_option">Comments</a></li>
								<li><a href="//feet9.net/tags" class="sub_option">Tags</a></li>
								<li><a href="//feet9.net/upload" class="sub_option">Upload</a></li>
							</ul>
						</li>
					</ul>
					<ul>
						<li>
							<a href="//feet9.net/post/list" class="top_parent">Help &#9660;</a>
							<ul>
								<li><a href="//feet9.net/wiki/rules" class="sub_option">Rules</a></li>
								<li><a href="//feet9.net/wiki/faq" class="sub_option">F.A.Q.</a></li>
								<li><a href="//feet9.net/wiki/tagging" class="sub_option">Tagging Guide</a></li>
								<li><a href="//feet9.net/wiki/staff" class="sub_option">Staff</a></li>
								<li><a href="mailto:staff@feet9.net" class="sub_option">Contact</a></li>
							</ul>
						</li>
					</ul>
					<ul>
						<li><a class="menu top_parent" href="//feet9.net/wiki/updates">Updates</a></li>
					</ul>
				</div>
			</div>
		</td>
	</tr>
</table>
