import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { ToggleControl } from '@wordpress/components';
import { registerPlugin } from '@wordpress/plugins';
import { useSelect, useDispatch } from '@wordpress/data';
import { useEffect, useState } from '@wordpress/element';
import { createBlock, setDefaultBlockName } from '@wordpress/blocks';

const MyDocumentSettingPanel = () => {


    const postType = useSelect((select) => select('core/editor').getCurrentPostType());
    if (postType !== 'page') {
        return null;
    }
    const meta = useSelect((select) => select('core/editor').getEditedPostAttribute('meta'));
    const { editPost } = useDispatch('core/editor');
    const isToggled = meta._page_type_interior || false;
    const { replaceBlock, insertBlock } = useDispatch('core/block-editor');
    const blocks = useSelect((select) => select('core/block-editor').getBlocks());
    const [toggled, setToggled] = useState(isToggled);
    const handleToggleChange = (value) => {
        setToggled(value);
        editPost({ meta: { ...meta, _page_type_interior: value } });
    };

    useEffect(() => {
        if (toggled) {
            console.log(toggled)
            const homeBannerBlock = blocks.find(block => block.name === 'acf/home-banner');
            if (homeBannerBlock) {
                console.log("home banner")
                replaceBlock(homeBannerBlock.clientId, createBlock('acf/interior-banner'));
            } else {
                console.log("interior banner")
                setDefaultBlockName('acf/interior-banner')
            }
        } else {
            const interiorBannerBlock = blocks.find(block => block.name === 'acf/interior-banner');
            console.log(blocks)
            if (interiorBannerBlock) {
                replaceBlock(interiorBannerBlock.clientId, createBlock('acf/home-banner'));
            } else {
                if (blocks.length != 0) {
                    insertBlock(createBlock('acf/home-banner'), interiorBannerBlock?.clientId, true);
                } else {
                    setDefaultBlockName('acf/home-banner')
                }

            }
        }
    }, [toggled, isToggled]);

    useEffect(() => {
        if (blocks.some(block => block.name === 'acf/interior-banner' || block.name === 'acf/home-banner')) {
            setDefaultBlockName('core/paragraph');
        }
    }, [blocks]);



    return (
        <PluginDocumentSettingPanel
            name="myplugin/document-setting-panel"
            title="Page Type Toggle"
            className="myplugin-document-setting-panel"
        >
            <ToggleControl
                label="Interior Page"
                checked={toggled}
                onChange={handleToggleChange}
            />
        </PluginDocumentSettingPanel>
    );
};

registerPlugin('myplugin-document-setting-panel', {
    render: MyDocumentSettingPanel,
    icon: 'admin-settings',
});
