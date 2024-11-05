// --------------- MESSAGES -------------------

// message with yes, no, close buttons
function createGameMessagePUHandlerYNC(popup)
{
    let yOffset = -70; 
    // add background and panel
    let backGround = popup.scene.add.sprite(0, -40 + yOffset, 'white_bkg').setOrigin(0.5).setScale(2000);
    backGround.setInteractive(); // block bottom controls
    backGround.tint = 0x1e1c20;
    popup.add(backGround);
    let panel = popup.scene.add.sprite(0, 0 + yOffset, 'message_panel').setOrigin(0.5);
    popup.add(panel);

    // add caption
    popup.captionText = popup.scene.add.bitmapText(0, -110 + yOffset, 'gameFont_0', 'Caption', 60, 1).setOrigin(0.5);
    popup.captionText.setLetterSpacing(1.2);
    popup.captionText.tint = 0xfef859;
    popup.add(popup.captionText);

    // add message
    popup.messageText = popup.scene.add.bitmapText(0, -10 + yOffset, 'gameFont_1', 'Message', 46, 1).setOrigin(0.5);
    popup.add(popup.messageText);

    // add buttons
    popup.addButton('okButton','small_button', 'small_button_hover', false, -110, 120 + yOffset);
    popup.addButton('noButton','small_button', 'small_button_hover', false, 110, 120 + yOffset);
    popup.addButton('exitButton','exit_button', 'exit_button_hover', false, 280, -185 + yOffset);
    popup['okButton'].clickEvent.add(()=>{popup.scene.soundController.playClip('button_click', false);}, popup);
    popup['noButton'].clickEvent.add(()=>{popup.scene.soundController.playClip('button_click', false);}, popup);
    popup['exitButton'].clickEvent.add(()=>{popup.scene.soundController.playClip('button_click', false);}, popup);

    // add button text
    popup.okText = popup.scene.add.bitmapText(-110, 115 + yOffset, 'gameFont_3', 'OK', 46, 1).setOrigin(0.5);
    popup.add(popup.okText);

    popup.noText = popup.scene.add.bitmapText(110, 115 + yOffset, 'gameFont_3', 'NO', 46, 1).setOrigin(0.5);
    popup.add(popup.noText);
}

// message with close button
function createGameMessagePUHandler(popup)
{
    let yOffset = -70; 
    // add background and panel
    let backGround = popup.scene.add.sprite(0, -40 + yOffset, 'white_bkg').setOrigin(0.5).setScale(2000);
    backGround.setInteractive(); // block bottom controls
    backGround.tint = 0x1e1c20;
    popup.add(backGround);
    let panel = popup.scene.add.sprite(0, 0 + yOffset, 'message_panel').setOrigin(0.5);
    popup.add(panel);

    // add caption
    popup.captionText = popup.scene.add.bitmapText(0, -70 + yOffset, 'gameFont_0', 'Caption', 60, 1).setOrigin(0.5);
    popup.captionText.setLetterSpacing(1.2);
    popup.captionText.tint = 0xfef859;
    popup.add(popup.captionText);

    // add message
    popup.messageText = popup.scene.add.bitmapText(0, 40 + yOffset, 'gameFont_1', 'Message', 46, 1).setOrigin(0.5);
    popup.add(popup.messageText);

    // add buttons
    popup.addButton('exitButton','exit_button', 'exit_button_hover', false, 280, -185 + yOffset);
    popup['exitButton'].clickEvent.add(()=>{popup.scene.soundController.playClip('button_click', false);}, popup);
}


