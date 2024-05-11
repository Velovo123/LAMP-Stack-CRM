-- Insert sample data into Campaign table
INSERT INTO Campaign (Name, Budget, StartDate, EndDate, CreativeDirector)
VALUES 
    ('Summer Campaign', 10000.00, '2024-06-01', '2024-08-31', 'John Doe'),
    ('Holiday Campaign', 20000.00, '2024-11-01', '2024-12-31', 'Jane Smith'),
    ('Spring Sale', 15000.00, '2024-03-01', '2024-04-30', 'Sarah Johnson'),
    ('Back to School', 12000.00, '2024-08-15', '2024-09-15', 'Mike Brown'),
    ('End of Year Clearance', 18000.00, '2024-12-01', '2024-12-31', 'Emily White');

-- Insert sample data into Advertisement table
INSERT INTO Advertisement (CampaignID, Type, Content, CreativeTeam)
VALUES 
    (1, 'Social Media', 'Summer Sale!', 'Design Team'),
    (2, 'Print', 'Holiday Discounts!', 'Marketing Team'),
    (3, 'Email', 'Spring Deals!', 'Content Team'),
    (4, 'Billboard', 'Back to School Special!', 'Design Team'),
    (5, 'TV Commercial', 'Year-End Clearance Sale!', 'Production Team');

-- Insert sample data into AdvertisementPlacement table
INSERT INTO AdvertisementPlacement (AdvertisementID, PlacementDetails, Cost, DurationDays)
VALUES 
    (1, 'Facebook', 500.00, 30),
    (2, 'Magazine', 1000.00, 60),
    (3, 'Newsletter', 300.00, 15),
    (4, 'Highway', 800.00, 45),
    (5, 'Prime Time', 2000.00, 30);

-- Insert sample data into Client table
INSERT INTO Client (Name, Email, Phone, BillingAddress, AccountManager)
VALUES 
    ('ABC Company', 'abc@example.com', '1234567890', '123 Main St, City, Country', 'John Smith'),
    ('XYZ Corporation', 'xyz@example.com', '0987654321', '456 High St, City, Country', 'Jane Doe'),
    ('Acme Inc.', 'acme@example.com', '9876543210', '789 Broadway, City, Country', 'Mike Johnson'),
    ('Global Enterprises', 'global@example.com', '0123456789', '101 Park Ave, City, Country', 'Emily Clark'),
    ('Smith & Co.', 'smith@example.com', '1112223333', '555 Elm St, City, Country', 'Sarah Lee');

-- Insert sample data into ContactUs table
INSERT INTO ContactUs (Email, Name, Message)
VALUES 
    ('info@example.com', 'John', 'Interested in your services.'),
    ('support@example.com', 'Jane', 'Having trouble with the website.'),
    ('sales@example.com', 'Mike', 'Looking for a quote.'),
    ('feedback@example.com', 'Emily', 'Providing feedback.'),
    ('questions@example.com', 'Sarah', 'Have some questions.');

-- Insert sample data into Employee table
INSERT INTO Employee (Name, Position, Email, Phone, Salary, Department)
VALUES 
    ('John Smith', 'Manager', 'john@example.com', '1234567890', 5000.00, 'Management'),
    ('Jane Doe', 'Marketing Specialist', 'jane@example.com', '0987654321', 4000.00, 'Marketing'),
    ('Mike Johnson', 'Sales Representative', 'mike@example.com', '9876543210', 4500.00, 'Sales'),
    ('Emily Clark', 'Customer Support', 'emily@example.com', '0123456789', 3800.00, 'Support'),
    ('Sarah Lee', 'Finance Analyst', 'sarah@example.com', '1112223333', 4200.00, 'Finance');

-- Insert sample data into Invoice table
INSERT INTO Invoice (ClientID, CampaignID, InvoiceDate, PaymentStatus, TotalAmount)
VALUES 
    (1, 1, '2024-07-15', 'Pending', 5000.00),
    (2, 2, '2024-12-01', 'Paid', 10000.00),
    (3, 3, '2024-04-15', 'Pending', 7500.00),
    (4, 4, '2024-09-01', 'Paid', 6000.00),
    (5, 5, '2024-12-20', 'Pending', 8500.00);

-- Insert sample data into Payment table
INSERT INTO Payment (InvoiceID, EmployeeID, PaymentDate, PaymentMethod, TransactionReference)
VALUES 
    (1, 1, '2024-07-20', 'Credit Card', 'CC123456'),
    (2, 2, '2024-12-10', 'Bank Transfer', 'BT789012'),
    (3, 3, '2024-04-20', 'Check', 'CHK456789'),
    (4, 4, '2024-09-15', 'Credit Card', 'CC987654'),
    (5, 5, '2024-12-25', 'Bank Transfer', 'BT012345');

-- Insert sample data into PerformanceMetric table
INSERT INTO PerformanceMetric (AdvertisementID, Impressions, Clicks, Conversions, Date)
VALUES 
    (1, 10000, 500, 50, '2024-06-15'),
    (2, 20000, 1000, 100, '2024-11-15'),
    (3, 15000, 750, 75, '2024-04-20'),
    (4, 12000, 600, 60, '2024-09-20'),
    (5, 18000, 900, 90, '2024-12-30');

-- Insert sample data into VendorSupplierInformation table
INSERT INTO VendorSupplierInformation (VendorName, ContactInfo, ServicesProvided, PaymentTerms)
VALUES 
    ('Print Co.', 'info@printco.com', 'Printing Services', 'Net 30 days'),
    ('Social Media Agency', 'info@socialmedia.com', 'Social Media Marketing', 'Net 60 days'),
    ('Billboard Advertising', 'info@billboard.com', 'Outdoor Advertising', 'Net 45 days'),
    ('Email Marketing Pro', 'info@emailmarketing.com', 'Email Marketing Services', 'Net 30 days'),
    ('TV Production House', 'info@tvproduction.com', 'TV Commercial Production', 'Net 60 days');

-- Insert sample data into VendorInvoice table
INSERT INTO VendorInvoice (PaymentID, VendorID, InvoiceDate, TotalAmount, PaymentStatus)
VALUES 
    (1, 1, '2024-07-25', 1000.00, 'Paid'),
    (2, 2, '2024-12-15', 2000.00, 'Pending'),
    (3, 3, '2024-04-25', 1500.00, 'Paid'),
    (4, 4, '2024-09-20', 1200.00, 'Pending'),
    (5, 5, '2024-12-30', 2500.00, 'Paid');
