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
import axios from "axios";

window.$ = $; // Make jQuery globally available
window.jQuery = $; // Some plugins might require `jQuery` as well

const fetchLinkUrl = window.fetchLinkUrl;
const postContent = window.postContent;
const post_id = window.postId;
const csrf = window.csrfToken;
const rateUrl = window.rateUrl;

let likeDataContainer = document.querySelector('#like-data');
let dislikeDataContainer = document.querySelector('#dislike-data');
let likeData = parseInt(document.querySelector('#like-data').innerHTML);
let dislikeData = parseInt(document.querySelector('#dislike-data').innerHTML);
let likeButton = document.querySelector('#like-button'); 
let likeText = document.querySelector('#like-count');
let dislikeButton = document.querySelector('#dislike-button'); 
let dislikeText = document.querySelector('#dislike-count');

function postLiked(){
    axios.post(rateUrl, {
        rating: 1,
        post_id: post_id
    }, {
        headers: {
            'X-CSRF-TOKEN': csrf
        }
    }).then((response) => {
        let msg = response.data.message;
        switch (msg) {
            case 'liked':
                likeData++;
                likeButton.classList.add('btn-primary');
                break;
            case 'unliked':
                likeData--;
                likeButton.classList.remove('btn-primary');
                break;
            case 'to like':
                likeData++;
                dislikeData--;
                likeButton.classList.add('btn-primary');
                dislikeButton.classList.remove('btn-danger');
                break;
            default:
                break;
        }
        likeDataContainer.innerHTML = likeData;
        dislikeDataContainer.innerHTML = dislikeData;
    }).catch((error) => {
        console.error(error);
    });
}

function postDisliked(){
    axios.post(rateUrl, {
        rating: -1,
        post_id: post_id
    }, {
        headers: {
            'X-CSRF-TOKEN': csrf
        }
    }).then((response) => {
        let msg = response.data.message;
        switch (msg) {
            case 'disliked':
                dislikeData++;
                dislikeButton.classList.add('btn-danger');
                break;
            case 'undisliked':
                dislikeData--;
                dislikeButton.classList.remove('btn-danger');
                break;
            case 'to dislike':
                dislikeData++;
                likeData--;
                dislikeButton.classList.add('btn-danger');
                likeButton.classList.remove('btn-primary');
                break;
            default:
                break;
        }
        dislikeDataContainer.innerHTML = dislikeData;
        likeDataContainer.innerHTML = likeData;
    }).catch((error) => {
        console.error(error);
    });
}

likeButton.addEventListener('click', postLiked);
dislikeButton.addEventListener('click', postDisliked);

$(document).ready(function () {
    class CustomImageTool extends ImageTool {
    }

    const editor = new EditorJS({
        readOnly: true,
        holder: "editorjs",
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
            },
        },
    });
});