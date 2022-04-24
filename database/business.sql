drop database if exists business;

create database business;

	create table business.users(
		id 						int(6)not null auto_increment,
		`username`				varchar(15) not null,
		`password`				varchar(100)not null,
		`role`					varchar(50)default "user",
								primary key(id)
		);


	create table business.address(
		id 						int(6)not null auto_increment,
		type 					varchar(26)default "owner",
		bldgNo					varchar(50)default null,
		bldgName				varchar(50)default null,
		unitNo					varchar(50)default null,
		street 					varchar(50)default null,
		brgy 					varchar(50)default null,
		subdivision				varchar(50)default null,
		municipality 			varchar(50)default null,
		province 				varchar(50)default null,
								primary key(id)
		);

	create table business.personal_information(
		id 						int(6)not null auto_increment,
		photo 					varchar(100)default "assets/img/default_image.png",
		firstName 				varchar(50)not null,
		middleName 				varchar(50)not null,
		lastName 				varchar(50)not null,
		gender 					varchar(26)not null,
		birthdate				date not null,
		age 					int(6)not null,
		contactNo 				varchar(26)default null,
		email 					varchar(50)default null,
		userId					int(8)not null,
								primary key(id),
								foreign key(userId)references business.users(id)
		);

	create table business.owner(
		id 						int(6)not null auto_increment,
		infoId 					int(6)not null,
		addressId 				int(6)not null,
								primary key(id),
								foreign key(infoId)references business.personal_information(id),
								foreign key(addressId)references business.address(id)		
		);


	create table business.business(
		id 						int(6)not null auto_increment,
		presidentFname			varchar(50)not null,			
		presidentMname			varchar(50)not null,			
		presidentLname			varchar(50)not null,			
		businessName 			varchar(50)not null,
		tradeName				varchar(50)not null,
		DTIRegNo				varchar(50)not null,
		DTIRegDate		 		date default current_timestamp,
		type 					varchar(26)not null,
		paymentMode				varchar(26)not null,
		applicationDate			date default current_timestamp,
		taxYear 				date default current_date,
		area					varchar(50)default null,
		officeMunicipality		varchar(100)default null,
		maleEmployees 			int(6)not null,
		femaleEmployees 		int(6)not null,
		employeesLGU			int(6)not null,
		ownerId					int(6)not null,
		addressId				int(6)not null,
		tinNumber				int(6)not null,
		businessEmail			varchar(50)default null,
		businessContact			varchar(50)default null,
		status					varchar(26)default 'pending',
								primary key(id),
								foreign key(ownerId)references business.owner(id),
								foreign key(addressId)references business.address(id)
		);

	create table business.lessor(
		id 						int(6)not null auto_increment,
		fullName				varchar(100)not null,
		fullAddress 			varchar(100)not null,
		contactNo 				varchar(20)not null,
		email 					varchar(50)not null,
		monthly 				int(6)not null,
		businessId 				int(6)not null,
								primary key(id),
								foreign key(businessId)references business.business(id)
		);

	create table business.activity(
		id 						int(6)not null auto_increment,
		lineOfBusiness 			varchar(50)not null,
		noOfUnits				int(6)not null,
		capitalization			varchar(50)default null,
		GrossEssential 			varchar(50)default null,
		GrossNonEssential 		varchar(50)default null,
		businessId 				int(6)not null,
								primary key(id),
								foreign key(businessId)references business.business(id)
		);

	create table business.business_mode(
		id 						int(6)not null auto_increment,
		businessId 				int(6)not null,
		mode 					varchar(26)default 'new',
								primary key(id),
								foreign key(businessId)references business.business(id)
		);

	create table business.official_receipt(
		id 						int(6)not null auto_increment,
		businessId 				int(6)not null,
		paymentDate 			datetime default current_timestamp,
		amountPaid 				int(6)not null,
								primary key(id),
								foreign key(businessId)references business.business(id)
		);



	create table business.retirement(
		id 						int(6)not null auto_increment,
		businessId 				int(6)not null,
		controlNo				int(6)not null,
		effectDate 				datetime not null,
								primary key(id),
								foreign key(businessId)references business.business(id)
		);

	create table business.requirements(
		id 						int(6)not null auto_increment,
		type					varchar(26) not null default 'new',
		DTIBusNameReg			varchar(26) not null default 'pending',
		BrgyClearance			varchar(26) not null default 'pending',
		ZoningClearance			varchar(26) not null default 'pending',
		CEO						varchar(26) not null default 'pending',
		BFP						varchar(26) not null default 'pending',
		CHO						varchar(26) not null default 'pending',
		ContractOflease			varchar(26) not null default 'pending',
		Cedula					varchar(26) not null default 'pending',
		InvestedCapital			varchar(26) not null default 'pending',
		Picture					varchar(26) not null default 'pending',
		Others					varchar(26) not null default 'pending',
		status 					varchar(26) not null default 'new',
		personId	 			int(6)not null,
								primary key(id),
								foreign key(personId)references business.personal_information(id)
		);

	create table business.renew_requirements(
		id 						int(6)not null auto_increment,
		requirementsId 			int(6)not null,
		businessId				int(6)not null,
								primary key(id),
								foreign key(requirementsId)references business.requirements(id),
								foreign key(businessId)references business.business(id)
		);

	create table business.document_verification(
		id 						int(6)not null auto_increment,
		BrgyClearance			varchar(26)not null default 'not needed',
		ZoningClearance			varchar(26)not null default 'not needed',
		OccupancyPermit			varchar(26)not null default 'not needed',
		AnnualInspection		varchar(26)not null default 'not needed',
		SanitaryPermit			varchar(26)not null default 'not needed',
		FireCertificate			varchar(26)not null default 'not needed',
		EnvironmentCertificate	varchar(26)not null default 'not needed',
		MarketClearance			varchar(26)not null default 'not needed',
		businessId				int(6)not null,
								primary key(id),
								foreign key(businessId)references business.business(id)
		);


	create table business.regulatory_fees(
		id 						int(6)not null auto_increment,
		MayorsPermit			int(6)not null,
		GarbageCharges			int(6)not null,
		DeliveryTrucks			int(6)not null,
		SanitaryInspection		int(6)not null,
		BldgInspection			int(6)not null,
		ElectricalInspection	int(6)not null,
		MechanicalInspection	int(6)not null,
		PlumbingInspection		int(6)not null,
		SubstanceStorage		int(6)not null,
		Others					int(6)not null,
		FireSafetyFee			int(6)not null,
		businessId				int(6)not null,
								primary key(id),
								foreign key(businessId)references business.business(id)
		);

	create table business.line_of_business(
		id  					int(6)not null auto_increment,
		lob_name				varchar(26)not null,
		lob_rate 				int(6)not null,
								primary key(id)
		);


INSERT into business.users(`username`,`password`)VALUES
('username',md5('password'));


select concat('#',lpad(business.id,4,'0')) as newId ,concat(firstName,' ',lastName) as name, businessName
from business.business_mode
inner join business.business on business_mode.businessId = business.id
inner join business.owner on business.ownerId = owner.id
inner join business.personal_information on owner.infoId = personal_information.id
where mode = 'new';

select businessId,personal_information.*, businessName
from business.business
inner join business.owner on business.ownerId = owner.id
inner join business.personal_information on owner.infoId = personal_information.id
where businessId = 1;
