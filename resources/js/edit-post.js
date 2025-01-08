import EditorJS from "@editorjs/editorjs";
import LinkTool from "@editorjs/link";
import Quote from "@editorjs/quote";
import Checklist from "@editorjs/checklist";
import Header from "@editorjs/header";
import List from "@editorjs/list";
import Embed from "@editorjs/embed";
import Table from "@editorjs/table";
import Marker from "@editorjs/marker";
import Delimiter from "@editorjs/delimiter";
import InlineCode from "@editorjs/inline-code";
import ImageTool from "@editorjs/image";
import editorjsCodecup from '@calumk/editorjs-codecup';
import $ from "jquery";
import "@selectize/selectize";
import axios from "axios";

window.$ = $; // Make jQuery globally available
window.jQuery = $; // Some plugins might require `jQuery` as well

const uploadImageUrl = window.uploadImageUrl;
const deleteImageUrl = window.deleteImageUrl;
const fetchLinkUrl = window.fetchLinkUrl;
const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");
console.log(csrfToken);
const postContent = window.postContent;

$(document).ready(function () {
    class CustomImageTool extends ImageTool {
        removed() {
            const { file } = this._data;
            const imageUrl = file.url;

            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");

            axios
                .post(
                    deleteImageUrl,
                    { imageUrl },
                    {
                        headers: {
                            "X-CSRF-TOKEN": csrfToken, // Add CSRF token for delete request
                        },
                    }
                )
                .then((response) => {
                    console.log("Image deleted successfully:", response.data);
                })
                .catch((error) => {
                    console.error("Error deleting the image:", error);
                });
        }
    }

    const editor = new EditorJS({
        holder: "editorjs",
        placeholder: "Tulis di sini...",
        data: postContent,
        tools: {
            header: {
                class: Header,
                inlineToolbar: true,
                shortcut: "CMD+SHIFT+H",
            },
            list: {
                class: List,
                inlineToolbar: true,
                shortcut: "CMD+SHIFT+L",
            },
            linkTool: {
                class: LinkTool,
                config: {
                    endpoint: fetchLinkUrl,
                },
                shortcut: "CMD+K",
            },
            quote: {
                class: Quote,
                inlineToolbar: true,
                shortcut: "CMD+SHIFT+Q",
            },
            checklist: Checklist,
            embed: Embed,
            table: {
                class: Table,
                shortcut: "CMD+ALT+T",
            },
            marker: Marker,
            code: editorjsCodecup,
            delimiter: Delimiter,
            inlineCode: InlineCode,
            image: {
                class: CustomImageTool,
                config: {
                    additionalRequestHeaders: {
                        "X-CSRF-TOKEN": csrfToken
                    },
                    endpoints: {
                        byFile: uploadImageUrl,
                    },
                    field: "image",
                    types: "image/*",
                },
            },
        },
    });

    $("#topic").selectize();
    $("#grade").selectize();

    var tags = []; // Array to store the tags

    window.tags.forEach(element => {
        tags.push(element['name']);
    });

    console.log(tags);

    // Handle key press event
    $("#tag-input").keypress(function (event) {
        var keycode = event.keyCode ? event.keyCode : event.which;
        if (keycode == "13") {
            // If Enter key is pressed
            event.preventDefault(); // Prevent form submission

            var tag = $(this).val().trim(); // Get the entered tag value
            if (tag !== "") {
                tags.push(tag); // Add the tag to the array
                updateTagList(); // Update the tags list
                $(this).val(""); // Clear the input field
            }
        }
    });

    // Handle tag delete event
    $(document).on("click", ".tag-delete", function () {
        var index = $(this).data("index");
        tags.splice(index, 1); // Remove the tag from the array
        updateTagList(); // Update the tags list
    });

    // Update the tags list
    function updateTagList() {
        var tagList = $("#tag-list");
        tagList.empty(); // Clear the tag list

        // Loop through the tags array and append tags to the list
        for (var i = 0; i < tags.length; i++) {
            var tagItem = $('<span class="tag">' + tags[i] + "</span>");
            var deleteButton = $(
                '<span class="tag-delete mx-2" data-index="' +
                    i +
                    '">| x</span>'
            );
            tagItem.append(deleteButton);
            tagList.append(tagItem);
        }
    }
    updateTagList();

    let submitBtn = document.querySelector("#btn-submit");
    // let output = document.querySelector('#output-data');
    submitBtn.addEventListener("click", function (event) {
        event.preventDefault();
        editor.save().then((savedData) => {
            // output.innerHTML = JSON.stringify(savedData);

            let post_content_input = document.createElement("input");
            post_content_input.type = "text";
            post_content_input.name = "post_content";
            post_content_input.value = JSON.stringify(savedData);

            let tag_input = document.createElement("input");
            tag_input.type = "text";
            tag_input.name = "tags";
            if (tags.length > 0) {
                tag_input.value = tags;
            }

            let parentElement = document.getElementById("post_form");
            parentElement.appendChild(post_content_input);
            parentElement.appendChild(tag_input);
            parentElement.submit();
        });
    });
});
