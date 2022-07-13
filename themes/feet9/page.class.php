<?php

declare(strict_types=1);
class Page extends BasePage
{
	function custom_footer_html(): string
    {
        $debug = get_debug_info();
        $contact_link = contact_link();
        $contact = empty($contact_link) ? "" : " / <a href='$contact_link'>Contact</a>";
		$generated = autodate(date('c'));

        return "
			<span style=\"font-size: 12px;\">
				<a href=\"//github.com/feet9/feetbooru\">FeetBooru</a> &copy;
				<a href=\"//feet9.net\">Feet9.Net Team</a>
			</span>
			<hr />
			Page generated $generated / Media &copy; their respective owners
			<br>
			<a href=\"//feet9.net\wiki\rules\">Rules</a> /
			<a href=\"//feet9.net/wiki/terms\">Terms of use</a> /
			<a href=\"//feet9.net/wiki/privacy\">Privacy policy</a> /
			<a href=\"//feet9.net/wiki/2257\">18 U.S.C. &sect;2257</a>
			$contact
        ";
    }
    public function render()
    {
        global $config, $user;

        $theme_name = $config->get_string('theme', 'default');
        $data_href = get_base_href();
        $header_html = $this->get_all_html_headers();

        $left_block_html = "";
        $right_block_html = "";
        $main_block_html = "";
        $head_block_html = "";
        $sub_block_html = "";

        foreach ($this->blocks as $block) {
            switch ($block->section) {
                case "left":
                    $left_block_html .= $block->get_html(true);
                    break;
                case "right":
                    $right_block_html .= $block->get_html(true);
                    break;
                case "head":
                    $head_block_html .= "<td class='headcol'>".$block->get_html(false)."</td>";
                    break;
                case "main":
                    $main_block_html .= $block->get_html(false);
                    break;
                case "subheading":
                    $sub_block_html .= $block->body; // $block->get_html(true);
                    break;
                default:
                    print "<p>error: {$block->header} using an unknown section ({$block->section})";
                    break;
            }
        }

        $query = !empty($this->_search_query) ? html_escape(Tag::implode($this->_search_query)) : "";
        assert(!is_null($query));  # used in header.inc, do not remove :P
        $flash_html = $this->flash ? "<b id='flash'>".nl2br(html_escape(implode("\n", $this->flash)))."</b>" : "";
        $generated = autodate(date('c'));
        $footer_html = custom_footer_html();

        print <<<EOD
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{$this->title}</title>
		<meta name="description" content="The Best Foot Fetish Content"/>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<meta name="theme-color" content="#A1DEE2">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="//feet9.net/themes/feet9/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="//feet9.net/themes/feet9/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="//feet9.net/themes/feet9/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="//feet9.net/themes/feet9/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="//feet9.net/themes/feet9/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="//feet9.net/themes/feet9/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="//feet9.net/themes/feet9/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="//feet9.net/themes/feet9/apple-touch-icon-152x152.png" />
		<link rel="apple-touch-icon" sizes="180x180" href="//feet9.net/themes/feet9/apple-touch-icon-180x180.png" />
		<link rel="stylesheet" href="$data_href/themes/$theme_name/menuh.css?_=1" type="text/css">
        $header_html

		<script defer src="//unpkg.com/webp-hero@0.0.0-dev.21/dist-cjs/polyfills.js"></script>
		<script defer src="//unpkg.com/webp-hero@0.0.0-dev.21/dist-cjs/webp-hero.bundle.js"></script>
		<script>
		document.addEventListener('DOMContentLoaded', () => {
			var webpMachine = new webpHero.WebpMachine()
			webpMachine.polyfillDocument()
		});
		</script>
		<script src="//feet9.net/themes/feet9/prebid-ads.js"></script>
		<script>
		function makeid(length) {
			var result           = '';
			var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
			var charactersLength = characters.length;
			for ( var i = 0; i < length; i++ ) {
				result += characters.charAt(Math.floor(Math.random() * charactersLength));
			}
			return result;
		}
		function stat(ob) {
			ob._ = makeid(10);
			var xhr = new XMLHttpRequest();
			xhr.open("GET", "/stat.txt?" + new URLSearchParams(ob).toString(), true);
			xhr.send();
		}
		function logTimes() {
			var t = window.performance.timing;
			stat({
				"v": 1,
				"class": "{$user->class->name}",
				"block": window.canRunAds === undefined,
				"proto": window.location.protocol,
				"responseStart": t.responseStart - t.fetchStart,
				"responseEnd": t.responseEnd - t.fetchStart,
				"domLoading": t.domLoading - t.fetchStart,
				"domInteractive": t.domInteractive - t.fetchStart,
				"domComplete": t.domComplete - t.fetchStart,
			})
		}
		// setTimeout(logTimes, 3000);
		</script>
	</head>

	<body>
<table id="header" width="100%">
	<tr>
		<td>
EOD;
        include "themes/feet9/header.inc";
        print <<<EOD
		</td>
		$head_block_html
	</tr>
</table>
		$sub_block_html

		<nav>
			$left_block_html
			<p>
				
			</p>
		</nav>

		<article>
			$flash_html
			<!-- <h2>Database reboot will be happening in a bit, expect a few minutes of downtime~</h2>-->
			$main_block_html
		</article>

		<footer>
		$footer_html
		</footer>

		<!-- BEGIN EroAdvertising ADSPACE CODE -->
		<!--<script type="text/javascript" language="javascript" charset="utf-8" src="//adspaces.ero-advertising.com/adspace/158168.js"></script>-->
		<!-- END EroAdvertising ADSPACE CODE -->
	</body>
</html>
EOD;
    }
}
