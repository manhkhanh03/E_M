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
            const data = {
                author_id: 1,
                categorie_id: 2,
                JSON: JSON.stringify(savedData.blocks),
                hot: 0,
                status_id: 2
            };
            const options = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }
            console.log(data)
            console.log(savedData)
            fetch('http://127.0.0.1:8000/api/articles', options)
                .then(response => response.json())
                .then(data => { 
                    console.log(data.blocks)
                })
        })
}

function getArticles() {
    fetch('http://127.0.0.1:8000/api/articles')
        .then(response => response.json())
        .then(data => {
            JSON.parse(data[0].JSON).forEach(element => {
                console.log(element.data)
            });
        })
}