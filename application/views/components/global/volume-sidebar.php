<div class="flex h-screen w-[300px] flex-col justify-between border-e bg-white">
	<div class="px-4 py-6">
		<p class="ml-2 text-lg font-bold">Volumes</p>

		<ul class="mt-2 space-y-1">
			<?php foreach ($volumes as $volume): ?>
			<li>
				<a
					href="<?php echo base_url()?>archived/<?php echo $volume['vol_id']?>"
					class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700"
				>
					<?php echo $volume['vol_name']; ?>
				</a>
			</li>
			<?php endforeach; ?>

		</ul>
	</div>
</div>
