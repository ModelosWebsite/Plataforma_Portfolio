<style>
    /** FORMATION SCROLLBAR DA ÁREA DE MENU */
  .container-scroll {
     background: #ddd;
     max-width: 900px;
     border-radius: 30px;
     overflow: hidden;
     position: relative;
   }
 
   .container-scroll i {
     width: 40px;
     height: 40px;
     cursor: pointer;
     display: flex;
     align-items: center;
     justify-content: center;
     color: #333;
     border-radius: 50%;
     pointer-events: auto;
   }
 
   .container-scroll i:hover {
     background: var(--background);
     color: #fff;
   }
 
   .container-scroll ul {
     display: flex;
     gap: 16px;
     padding: 12px 24px;
     margin: 0;
     list-style: none;
     overflow-x: scroll;
     -ms-overflow-style: none;
     scrollbar-width: none;
     scroll-behavior: smooth;
   }
 
   .container-scroll ul.dragging {
     scroll-behavior: auto;
   }
 
   .container-scroll ul::-webkit-scrollbar {
     display: none;
   }
 
   .container-scroll button {
     color: #333;
     font-weight: 500;
     text-decoration: none;
     background: #fff;
     padding: 4px 24px;
     display: inline-block;
     border-radius: 30px;
     user-select: none;
     white-space: nowrap;
     transition: ease-in-out;
     border: none;
   }
 
   .container-scroll button:hover,
   .container-scroll button.active {
     background: var(--background);
     color: #fff;
   }
 
   .iconChevron-left,
   .iconChevron-right {
     position: absolute;
     height: 100%;
     width: 100px;
     top: 0;
     display: none;
     align-items: center;
     padding: 0 10px;
     pointer-events: none;
   }
 
   .iconChevron-left.active,
   .iconChevron-right.active {
     display: flex;
   } 
 
   .iconChevron-right {
     right: 0;
     background: linear-gradient(to left, #ddd 50%, transparent);
     justify-content: flex-end;
   }
 
   .iconChevron-left {
     background: linear-gradient(to right, #ddd 50%, transparent);
   }
</style>
