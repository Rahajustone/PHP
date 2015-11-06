/*
 * CKFinder
 * ========
 * http://ckfinder.com
 * Copyright (C) 2007-2011, CKSource - Frederico Knabben. All rights reserved.
 *
 * The software, this file and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying or distribute this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
 *
 */

/**
 * @fileOverview Defines the {@link CKFinder.lang} object, for the English
 *		language. This is the base file for all translations.
 */

/**
 * Constains the dictionary of language entries.
 * @namespace
 */
CKFinder.lang['en'] =
{
	appTitle : 'CKFinder',

	// Common messages and labels.
	common :
	{
		// Put the voice-only part of the label in the span.
		unavailable		: '%1<span class="cke_accessibility">, unavailable</span>',
		confirmCancel	: 'Seçeneklerden bazıları değiştirildi. İletişim kutusunu kapatmak istediğinizden için emin misiniz?',
		ok				: 'Tamam',
		cancel			: 'İptal',
		confirmationTitle	: 'Onay',
		messageTitle	: 'Bilgi',
		inputTitle		: 'Soru',
		undo			: 'Geri',
		redo			: 'Yeniden Yap',
		skip			: 'Atla',
		skipAll			: 'Hepsini atla',
		makeDecision	: 'Ne yapmak istiyorsunuz ?',
		rememberDecision: 'Kararımı hatırla'
	},


	dir : 'ltr',
	HelpLang : 'en',
	LangCode : 'en',

	// Date Format
	//		d    : Day
	//		dd   : Day (padding zero)
	//		m    : Month
	//		mm   : Month (padding zero)
	//		yy   : Year (two digits)
	//		yyyy : Year (four digits)
	//		h    : Hour (12 hour clock)
	//		hh   : Hour (12 hour clock, padding zero)
	//		H    : Hour (24 hour clock)
	//		HH   : Hour (24 hour clock, padding zero)
	//		M    : Minute
	//		MM   : Minute (padding zero)
	//		a    : Firt char of AM/PM
	//		aa   : AM/PM
	DateTime : 'm/d/yyyy h:MM aa',
	DateAmPm : ['AM','PM'],

	// Folders
	FoldersTitle	: 'Klasörler',
	FolderLoading	: 'Yükleniyor...',
	FolderNew		: 'Lütfen klasör adını belirleyiniz: ',
	FolderRename	: 'Lütfen klasör adını belirleyiniz: ',
	FolderDelete	: '"%1" klasörünü silmek istediğinizden emin misiniz?',
	FolderRenaming	: ' (Adlandırılıyor...)',
	FolderDeleting	: ' (Siliniyor...)',

	// Files
	FileRename		: 'Lütfen dosya adını belirleyiniz: ',
	FileRenameExt	: 'Dosya adı uzantısını değiştirmek istediğinizden emin misini ? Dosya kullanılamaz hale gelebilir.',
	FileRenaming	: 'Adlandırılıyor...',
	FileDelete		: '"%1" dosyasını silmek istediğinizden emin misiniz?',
	FilesLoading	: 'Yükleniyor...',
	FilesEmpty		: 'Dosya boş',
	FilesMoved		: 'Dosya taşınıyor %1 - %2:%3',
	FilesCopied		: 'Dosya kopyalanıyor %1 - %2:%3',

	// Basket
	BasketFolder		: 'Sepet',
	BasketClear			: 'Sepeti Sil',
	BasketRemove		: 'Sepeti Kaldır',
	BasketOpenFolder	: 'Ana Klasörü Aç',
	BasketTruncateConfirm : 'Sepetteki düm dosyaları kaldırmak istediğinizden emin misiniz?',
	BasketRemoveConfirm	: '"%1" dosyasını sepetten gerçekten kaldırmak istiyormusunuz ?',
	BasketEmpty			: 'Sepet boş, sürükle\'n\'bırak.',
	BasketCopyFilesHere	: 'Sepetten dosya kopyala',
	BasketMoveFilesHere	: 'Sepetten dosya taşı',

	BasketPasteErrorOther	: 'Dosya %s hata: %e',
	BasketPasteMoveSuccess	: 'Aşağıdaki dosyalar taşındı: %s',
	BasketPasteCopySuccess	: 'Aşağıdaki dosyalar kopyalandı: %s',

	// Toolbar Buttons (some used elsewhere)
	Upload		: 'Yükle',
	UploadTip	: 'Yeni Dosya Yükle',
	Refresh		: 'Yenile',
	Settings	: 'Ayarlar',
	Help		: 'Yardım',
	HelpTip		: 'Yardım',

	// Context Menus
	Select			: 'Seç',
	SelectThumbnail : 'Küçük Resim Seç',
	View			: 'Göster',
	Download		: 'İndir',

	NewSubFolder	: 'Yeni Alt Klasör',
	Rename			: 'Adını Değiştir',
	Delete			: 'Sil',

	CopyDragDrop	: 'Klasörü buraya kopyala',
	MoveDragDrop	: 'Klasör oluştur',

	// Dialogs
	RenameDlgTitle		: 'Adını Değiştir',
	NewNameDlgTitle		: 'Yeni isim',
	FileExistsDlgTitle	: 'Dosya mevcut',
	SysErrorDlgTitle : 'Sistem hatası',

	FileOverwrite	: 'Üstüne Yaz',
	FileAutorename	: 'Otomatik Adlandır',

	// Generic
	OkBtn		: 'TAMAM',
	CancelBtn	: 'Vazgeç',
	CloseBtn	: 'Kapat',

	// Upload Panel
	UploadTitle			: 'Yeni Dosya Yükle',
	UploadSelectLbl		: 'Yükleyeceğin Dosyayı Seç',
	UploadProgressLbl	: 'Yükleme yapılıyor. Lütfen bekleyiniz...)',
	UploadBtn			: 'Yükle',
	UploadBtnCancel		: 'İptal',

	UploadNoFileMsg		: 'Bilgisayarınızdan bir dosya seçin',
	UploadNoFolder		: 'Yüklemeden önce klasör seçiniz.',
	UploadNoPerms		: 'Dosya yükleme izni yok.',
	UploadUnknError		: 'Dosya gönderirken hata oluştu.',
	UploadExtIncorrect	: 'Dosya uzantısı bu klasörde izin verilmiyor.',

	// Settings Panel
	SetTitle		: 'Ayarlar',
	SetView			: 'Göster:',
	SetViewThumb	: 'Küçük Resim',
	SetViewList		: 'Liste',
	SetDisplay		: 'Önizleme:',
	SetDisplayName	: 'Dosya Adı',
	SetDisplayDate	: 'Tarih',
	SetDisplaySize	: 'Dosya Boyutu',
	SetSort			: 'Sıralama:',
	SetSortName		: 'Dosya Adına Göre',
	SetSortDate		: 'Tarihe Göre',
	SetSortSize		: 'Boyuta Göre',

	// Status Bar
	FilesCountEmpty : '<Boş Klasör>',
	FilesCountOne	: '1 dosya',
	FilesCountMany	: '%1 dosya',

	// Size and Speed
	Kb				: '%1 kB',
	KbPerSecond		: '%1 kB/s',

	// Connector Error Messages.
	ErrorUnknown	: 'Bu isteği yerine getirmek mümkün değil. (Hata %1)',
	Errors :
	{
	 10 : 'Tanımsız komut.',
	 11 : 'Kaynak türü belirtilmedi :).',
	 12 : 'İstenen kaynak tipi geçerli değil.',
	102 : 'Geçersiz dosya yada klasör adı.',
	103 : 'Dosya yetkileri kısıtlamaları nedeniyle tamamlanamadı.',
	104 : 'Dosya izinleri kısıtlamaları nedeniyle tamamlanamadı.',
	105 : 'Geçersiz dosya uzantısı.',
	109 : 'Tanımsız gönderi.',
	110 : 'Tanımsız hata.',
	115 : 'Aynı isimde bi klasör yada dosya var.',
	116 : 'Klasör bulunamadı. Sayfayı yenileyin veya tekrar deneyin.',
	117 : 'Dosya bulunamadı. Sayfayı yenileyin veya tekrar deneyin.',
	118 : 'Kaynak ve hedef yolları aynı .',
	201 : 'Aynı isimde bir dosya zaten mevcut. Yüklenen dosya "%1" olarak değiştirildi ',
	202 : 'Tanımsız dosya',
	203 : 'Geçersiz dosya. Dosya boyutu çok büyük.',
	204 : 'Yüklenen dosya bozuk .',
	205 : 'Sunucuya yüklemek için geçici bir klasör kullanılamaz.',
	206 : 'Güvenlik nedeniyle yükleme durduruldu. Dosya HTML veri içeriyor.',
	207 : 'Dosya ismi "%1" ile değiştirildi',
	300 : 'Klasör(ler) oluşturulamadı.',
	301 : 'Kopyalama(lar) başarısız.',
	500 : 'Tarayıcı güvenlik nedeniyle devre dışı bırakıldı. Sistem yöneticinize başvurun.',
	501 : 'Küçük resim desteği devre dışı.'
	},

	// Other Error Messages.
	ErrorMsg :
	{
		FileEmpty		: 'Dosya adı boş olamaz',
		FileExists		: '%s dosyası zaten var',
		FolderEmpty		: 'Klasör adı boş olamaz.',

		FileInvChar		: 'Dosya adı aşağıdaki karakterlerden herhangi birini içeremez: \n\\ / : * ? " < > |',
		FolderInvChar	: 'Klasör adı aşağıdaki karakterlerden herhangi birini içeremez: \n\\ / : * ? " < > |',

		PopupBlockView	: 'Yeni bir pencerede dosyayı açmak mümkün değildi. Bu site için tarayıcı popup blocker ayarlarını yapılandırın.'
	},

	// Imageresize plugin
	Imageresize :
	{
		dialogTitle		: 'Yeni boyut %s',
		sizeTooBig		: '(%size) değeri orijinal boyuttan daha büyük görüntü yüksekliği veya genişliği ayarlanamıyor .',
		resizeSuccess	: 'Görüntü başarıyla ölçeklendirildi.',
		thumbnailNew	: 'Yeni küçük rezim oluştur',
		thumbnailSmall	: 'Küçük (%s)',
		thumbnailMedium	: 'Orta (%s)',
		thumbnailLarge	: 'Büyük (%s)',
		newSize			: 'Yeni boyut',
		width			: 'Genişlik',
		height			: 'Yükseklik',
		invalidHeight	: 'Geçersiz yükseklik.',
		invalidWidth	: 'Geçersiz genişlik.',
		invalidName		: 'Geçersiz dosya adı.',
		newImage		: 'Yeni resim oluştur',
		noExtensionChange : 'Dosya uzantısı değiştirilemez.',
		imageSmall		: 'Kaynak resim çok küçük',
		contextMenuName	: 'Boyutlandır'
	},

	// Fileeditor plugin
	Fileeditor :
	{
		save			: 'Kaydet',
		fileOpenError	: 'Dosya açılamıyor.',
		fileSaveSuccess	: 'Dosya başarıyla kaydedildi.',
		contextMenuName	: 'Düzelt',
		loadingFile		: 'Dosya yükleniyor. Lütfen bekleyiniz...'
	}
};
