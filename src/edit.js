

import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import { useSelect } from '@wordpress/data';

function Edit(props) {

	const ALLOWED_BLOCKS = wp.blocks
    .getBlockTypes()
    .map(block => block.name)
    .filter(blockName => blockName !== 'custom/container' && !blockName.startsWith('acf/'));

	const blockProps = useBlockProps({
		className: 'container',
		style: { border: '2px solid #ddd', padding: '20px' },
	});

	const { hasInnerBlocks } = useSelect((select) => {
		const { getBlock, getBlockParents } = select('core/block-editor');
		const block = getBlock(props.clientId);
		const parents = getBlockParents(props.clientId);
		return {
			hasInnerBlocks: block && block.innerBlocks.length > 0,
			isSelectedParent: parents.length > 0,
		};
	});

	return (
		<div {...blockProps}>
			<InnerBlocks
				allowedBlocks={ALLOWED_BLOCKS}
				renderAppender={hasInnerBlocks ? undefined : InnerBlocks.ButtonBlockAppender}
			/>
		</div>
	);

}



export default Edit;
