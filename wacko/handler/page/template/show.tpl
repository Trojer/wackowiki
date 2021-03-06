
.include _files.tpl
.include _comments.tpl
.include _rating.tpl

[ === main === ]
	[ ' dummy | default * // ADD_NO_DIV ' ]<article id="page-show">
		[= n _ =
			[ ' message ' ]
		=]

		[ ' restore ' ]
		[ ' reedit ' ]

		[= h _ =
			<header>
				<h1>[ ' title | e ' ]</h1>
			</header>
		=]
		<section id="section-content" class="page" data-dbclick="page">
			[ ' data | pre ' ]
		</section>
		[= p _ =
			<nav class="category">[ ' category ' ]</nav>
		=]

		[''' fp FilePanel ''']
		[''' cp CommentPanel ''']
		[''' rp RatingPanel ''']

	</article>


[= reedit =]
<div class="msg revision-info">
	[ ' message ' ]
	<br><br>
	<form action="[ ' href ' ]" method="post" name="edit_revision">
		[ ' csrf: edit_revision ' ]
		<input type="hidden" name="previous" value="[ ' modified ' ]">
		<input type="hidden" name="id" value="[ ' pageid ' ]">
		<input type="submit" value="[ ' _t: ReEditOldRevision ' ]">
		<a href="[ ' href: ' ]" class="btn-link">
			<input type="button" name="cancel" id="button" value="[ ' _t: CancelButton ' ]">
		</a>
	</form>
</div>

[= restore =]
<div class="msg warning">
	[ ' _t: PageDeletedInfo ' ]
	<br><br>
	<form action="[ ' href: restore ' ]" method="post" name="restore_page">
		[ ' csrf: restore_page ' ]
		<input type="hidden" name="id" value="[ ' pageid ' ]">
		<input type="submit" value="[ ' _t: RestoreButton ' ]">
	</form>
</div>

