<template>
 
<div class="comments-app">
 
   <h1>Comments</h1>
 
   <!-- From -->
 
   <div class="comment-form" v-if="user">
 
       <!-- Comment Avatar -->
 
       <div class="comment-avatar">
 
           <img src="storage/commentbox.png">
 
       </div>
 
 
 
       <form class="form" name="form">
 
           <div class="form-row">
 
               <textarea class="input" placeholder="Add comment..." required v-model="message"></textarea>
 
               <span class="input" v-if="errorComment" style="color:red">{{errorComment}}</span>
 
           </div>
 
 
 
           <div class="form-row">
 
               <input class="input" placeholder="Email" type="text" disabled :value="user.name">
 
           </div>
 
 
 
           <div class="form-row">
 
               <input type="button" class="btn btn-success" @click="saveComment" value="Add Comment">
 
           </div>
 
       </form>
 
   </div>
 
   <div class="comment-form" v-else>
 
       <!-- Comment Avatar -->
 
       <div class="comment-avatar">
 
           <img src="storage/commentbox.png">
 
       </div>
 
       <form class="form" name="form">
 
           <div class="form-row">
 
               <a href="login"><textarea
 
                 class="input"
 
                 placeholder="Add comment..."
 
                 required></textarea></a>
 
           </div>
 
       </form>
 
   </div>
 
   <!-- Comments List -->
 
   <div class="comments" v-if="comments" v-for="(comment,index) in commentsData">
 
       <!-- Comment -->
 
           <!-- Comment Avatar -->
 
           <div class="comment-avatar">
 
               <img src="storage/comment.png">
 
           </div>
 
 
 
           <!-- Comment Box -->
 
           <div class="comment-box">
 
               <div class="comment-text">{{comment.comment}}</div>
 
               <div class="comment-footer">
 
                   <div class="comment-info">
 
                       <span class="comment-author">
 
                               <em>{{ comment.name}}</em>
 
                           </span>
 
                       <span class="comment-date">{{ comment.date}}</span>
 
                   </div>
 
 
 
                   <div class="comment-actions">
 
                       <ul class="list">
 
                          
 
                           <li>
 
                               <a v-on:click="openComment(index)">Reply</a>
 
                           </li>
 
                       </ul>
 
                   </div>
 
               </div>
 
           </div>
 
           <!-- From -->
 
           <div class="comment-form comment-v" v-if="commentBoxs[index]">
 
               <!-- Comment Avatar -->
 
               <div class="comment-avatar">
 
                   <img src="storage/comment.png">
 
               </div>
 
 
 
               <form class="form" name="form">
 
                   <div class="form-row">
 
                       <textarea class="input" placeholder="Add comment..." required v-model="message"></textarea>
 
                       <span class="input" v-if="errorReply" style="color:red">{{errorReply}}</span>
 
                   </div>
 
 
 
                   <div class="form-row">
 
                       <input class="input" placeholder="Email" type="text" :value="user.name">
 
                   </div>
 
 
 
                   <div class="form-row">
 
                       <input type="button" class="btn btn-success" v-on:click="replyComment(comment.commentid,index)" value="Add Comment">
 
                   </div>
 
               </form>
 
           </div>
 
           <!-- Comment - Reply -->
 
           <div v-if="comment.replies">
 
               <div class="comments" v-for="(replies,index2) in comment.replies">
 
                  
 
                       <!-- Comment Avatar -->
 
                       <div class="comment-avatar">
 
                           <img src="storage/comment.png">
 
                       </div>
 
 
 
                       <!-- Comment Box -->
 
                       <div class="comment-box" style="background: grey;">
 
                           <div class="comment-text" style="color: white">{{replies.comment}}</div>
 
                           <div class="comment-footer">
 
                               <div class="comment-info">
 
                                   <span class="comment-author">
 
                                           {{replies.name}}
 
                                       </span>
 
                                   <span class="comment-date">{{replies.date}}</span>
 
                               </div>
 
 
 
                               <div class="comment-actions">
 
                                   <ul class="list">
 
                                       
 
                                       <li>
 
                                           <a v-on:click="replyCommentBox(index2)">Reply</a>
 
                                       </li>
 
                                   </ul>
 
                               </div>
 
                           </div>
 
                       </div>
 
                       <!-- From -->
 
                       <div class="comment-form reply" v-if="replyCommentBoxs[index2]">
 
                           <!-- Comment Avatar -->
 
                           <div class="comment-avatar">
 
                               <img src="storage/comment.png">
 
                           </div>
 
 
 
                           <form class="form" name="form">
 
                               <div class="form-row">
 
                                   <textarea class="input" placeholder="Add comment..." required v-model="message"></textarea>
 
                                   <span class="input" v-if="errorReply" style="color:red">{{errorReply}}</span>
 
                               </div>
 
 
 
                               <div class="form-row">
 
                                   <input class="input" placeholder="Email" type="text" :value="user.name">
 
                               </div>
 
 
 
                               <div class="form-row">
 
                                   <input type="button" class="btn btn-success" v-on:click="replyComment(comment.commentid,index)" value="Add Comment">
 
                               </div>
 
                           </form>
 
                       </div>
 
 
 
 
               </div>
 
           </div>
 
 
   </div>
 
</div>
 
 
 
</template>
<script>
 
var _ = require('lodash');
 
export default {
 
   props: ['commentUrl'],
 
   data() {
 
       return {
 
           comments: [],
 
           commentreplies: [],
 
           comments: 0,
 
           commentBoxs: [],
 
           message: null,
 
           replyCommentBoxs: [],
 
           commentsData: [],
 
           viewcomment: [],
 
           show: [],
 
           errorComment: null,
 
           errorReply: null,
 
           user: window.user
 
       }
 
   },
 
   http: {
 
       headers: {
 
           'X-CSRF-TOKEN': window.csrf
 
       }
 
   },
 
   methods: {
 
       fetchComments() {
 
           this.$http.get('comments/' + this.commentUrl).then(res => {
 
 
 
               this.commentData = res.data;
 
               this.comments = 1;
 
           });
 
           
 
       },
 
       showComments(index) {
 
           if (!this.viewcomment[index]) {
 
               Vue.set(this.show, index, "hide");
 
               Vue.set(this.viewcomment, index, 1);
 
           } else {
 
               Vue.set(this.show, index, "view");
 
               Vue.set(this.viewcomment, index, 0);
 
           }
 
       },
 
       openComment(index) {
 
           if (this.user) {
 
               if (this.commentBoxs[index]) {
 
                   Vue.set(this.commentBoxs, index, 0);
 
               } else {
 
                   Vue.set(this.commentBoxs, index, 1);
 
               }
 
           }
 
       },
 
       replyCommentBox(index) {
 
           if (this.user) {
 
               if (this.replyCommentBoxs[index]) {
 
                   Vue.set(this.replyCommentBoxs, index, 0);
 
               } else {
 
                   Vue.set(this.replyCommentBoxs, index, 1);
 
               }
 
           }
 
       },
 
       saveComment() {
 
           if (this.message != null && this.message != ' ') {
 
               this.errorComment = null;
 
               this.$http.post('comments', {
 
                   page_id: this.commentUrl,
 
                   comment: this.message,
 
                   users_id: this.user.id
 
               }).then(res => {
 
 
 
                   if (res.data.status) {
 
                       this.commentsData.push({ "commentid": res.data.commentId, "name": this.user.name, "comment": this.message, "reply": 0, "replies": [] });
 
                       this.message = null;
 
                   }
 
 
 
               });
 
           } else {
 
               this.errorComment = "Please enter a comment to save";
 
           }
 
       },
 
       replyComment(commentId, index) {
 
           if (this.message != null && this.message != ' ') {
 
               this.errorReply = null;
 
               this.$http.post('comments', {
 
                   comment: this.message,
 
                   users_id: this.user.id,
 
                   reply_id: commentId
 
               }).then(res => {
 
 
 
                   if (res.data.status) {
 
                       if (!this.commentsData[index].reply) {
 
                           this.commentsData[index].replies.push({ "commentid": res.data.commentId, "name": this.user.name, "comment": this.message});
 
                           this.commentsData[index].reply = 1;
 
                           Vue.set(this.replyCommentBoxs, index, 0);
 
                           Vue.set(this.commentBoxs, index, 0);
 
                       } else {
 
                           this.commentsData[index].replies.push({ "commentid": res.data.commentId, "name": this.user.name, "comment": this.message});
 
                           Vue.set(this.replyCommentBoxs, index, 0);
 
                           Vue.set(this.commentBoxs, index, 0);
 
                       }
 
                       this.message = null;
 
                   }
 
 
 
               });
 
           } else {
 
               this.errorReply = "Please enter a comment to save";
 
           }
 
       },
 
 
   },
 
   mounted() {
 
      console.log("mounted");
 
      this.fetchComments();
 
   }
 
 
 
}
 
</script>