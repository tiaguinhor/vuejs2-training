<template>
	<div>
		<div class="toolbar light">
			<quasar-toolbar-title :padding="1">
				Drawer
			</quasar-toolbar-title>
		</div>
		
		<div class="list no-border platform-delimiter">
			<quasar-drawer-link icon="view_quilt" to="/showcase/layout" exact>
				About Layout
			</quasar-drawer-link>
			<hr>
			<div class="list-label">Layout Components</div>
			<quasar-drawer-link icon="build" to="/showcase/layout/toolbar" exact>
				Toolbar
			</quasar-drawer-link>
			<quasar-drawer-link icon="tab" to="/showcase/layout/tabs" exact>
				Tabs
			</quasar-drawer-link>
			<quasar-drawer-link icon="compare_arrows" to="/showcase/layout/drawer" exact>
				Layout Drawer
			</quasar-drawer-link>
		</div>
	</div>
</template>