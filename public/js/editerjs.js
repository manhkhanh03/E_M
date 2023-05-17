const editorConfig = new EditorJS({
    /**
     * Enable/Disable the read only mode
     */
    readOnly: false,

    /**
     * Wrapper of Editor
     */
    holder: 'editorjs',

    autofocus: true,
    /**
     * Common Inline Toolbar settings
     * - if true (or not specified), the order from 'tool' property will be used
     * - if an array of tool names, this order will be used
     */
    // inlineToolbar: ['link', 'marker', 'bold', 'italic'],
    // inlineToolbar: true,

    /**
     * Tools list
     */
    tools: {
        /**
         * Each Tool is a Plugin. Pass them via 'class' option with necessary settings {@link docs/tools.md}
        */
        header: {
            class: Header,
            inlineToolbar: ['marker', 'link'],
            config: {
                placeholder: 'Header'
            },
            shortcut: 'CMD+SHIFT+H'
        },

        /**
         * Or pass class directly without any configuration
         */
        image: {
            // class: ImageTool,
            class: SimpleImage,
            // config: {
            //     endpoints: {
            //         byFile: 'http://127.0.0.1:5500'
            //     }
            // }
        },

        list: {
            class: NestedList,
            inlineToolbar: true,
            shortcut: 'CMD+SHIFT+L'
        },

        checklist: {
            class: Checklist,
            inlineToolbar: true,
        },

        quote: {
            class: Quote,
            inlineToolbar: true,
            config: {
                quotePlaceholder: 'Enter a quote',
                captionPlaceholder: 'Quote\'s author',
            },
            shortcut: 'CMD+SHIFT+O'
        },

        warning: Warning,

        marker: {
            class: Marker,
            shortcut: 'CMD+SHIFT+M'
        },

        code: {
            class: CodeTool,
            shortcut: 'CMD+SHIFT+C'
        },

        delimiter: Delimiter,

        inlineCode: {
            class: InlineCode,
            shortcut: 'CMD+SHIFT+C'
        },

        linkTool: LinkTool,

        raw: RawTool,

        embed: Embed,

        table: {
            class: Table,
            inlineToolbar: true,
            shortcut: 'CMD+ALT+T'
        },
    },
    data: {
        blocks: [
            {
                id: "zcKCF1S7X8",
                type: "header",
                data: {
                    text: "Nhập tiêu đề(tiêu đề luôn là Heading 1)",
                    level: 1
                }
            },
            {
                type: "header",
                id: "7ItVl5biRo",
                data: {
                    text: "Nhập tiêu đề phụ(tiêu đề phụ luôn là Heading 2)",
                    level: 2
                }
            },
        ]
    }
})

function randomString() {
    let result = '';
    let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    for (let i = 0; i < 20; i++) {
        result += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return result;
}


function myFunction() {
    editorConfig.save()
        .then(savedData => {
            const postId = randomString();
            const data = {
                id: postId,
                user_id: 2,
                theme_type_id: 2,
                url_id: 1,
                status_id: 2,
                hot: 0
            }
            const options = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }
            fetch('http://127.0.0.1:8000/api/post', options)
            return [savedData, postId]
        })
        .then((data) => {
            
            const options = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            }

            data[0].blocks.forEach((block, index) => {
                console.log(block)
                if (block.type === 'header') {
                    if (block.data.level === 1) {
                        let text = {
                            post_id: data[1],
                            header: block.data.text,
                            location: index
                        }
                        options.body = JSON.stringify(text)
                        fetch('http://127.0.0.1:8000/api/header', options)
                    } else {
                        let text = {
                            post_id: data[1],
                            subheadline: block.data.text,
                            location: index
                        }
                        options.body = JSON.stringify(text)
                        fetch('http://127.0.0.1:8000/api/subheadline', options)
                    }
                }
                else if (block.type === 'image') {
                    let img = {
                        mode_id: data[1],
                        url: block.data.url,
                        caption: block.data.caption,
                        location: index,
                        type: 1
                    }
                    options.body = JSON.stringify(img)
                    fetch('http://127.0.0.1:8000/api/images', options)
                } else if (block.type === 'paragraph') {
                    let content = {
                        post_id: data[1],
                        content: block.data.text,
                        location: index
                    }
                    options.body = JSON.stringify(content)
                    fetch('http://127.0.0.1:8000/api/contents', options)
                }
            });
        })
}