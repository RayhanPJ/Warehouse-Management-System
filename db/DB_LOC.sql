/* SQL SERVER VERSION */
USE [master]
GO
/****** Object:  Database [DB_LOC]    Script Date: 5/12/2023 8:42:07 AM ******/
CREATE DATABASE [DB_LOC]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'DB_LOC', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\DB_LOC.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'DB_LOC_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\DB_LOC_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT, LEDGER = OFF
GO
ALTER DATABASE [DB_LOC] SET COMPATIBILITY_LEVEL = 160
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [DB_LOC].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [DB_LOC] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [DB_LOC] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [DB_LOC] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [DB_LOC] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [DB_LOC] SET ARITHABORT OFF 
GO
ALTER DATABASE [DB_LOC] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [DB_LOC] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [DB_LOC] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [DB_LOC] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [DB_LOC] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [DB_LOC] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [DB_LOC] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [DB_LOC] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [DB_LOC] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [DB_LOC] SET  DISABLE_BROKER 
GO
ALTER DATABASE [DB_LOC] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [DB_LOC] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [DB_LOC] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [DB_LOC] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [DB_LOC] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [DB_LOC] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [DB_LOC] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [DB_LOC] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [DB_LOC] SET  MULTI_USER 
GO
ALTER DATABASE [DB_LOC] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [DB_LOC] SET DB_CHAINING OFF 
GO
ALTER DATABASE [DB_LOC] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [DB_LOC] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [DB_LOC] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [DB_LOC] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [DB_LOC] SET QUERY_STORE = ON
GO
ALTER DATABASE [DB_LOC] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 1000, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
USE [DB_LOC]
GO
/****** Object:  User [db_location]    Script Date: 5/12/2023 8:42:08 AM ******/
CREATE USER [db_location] FOR LOGIN [db_location] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  User [db_loc]    Script Date: 5/12/2023 8:42:08 AM ******/
CREATE USER [db_loc] FOR LOGIN [db_loc] WITH DEFAULT_SCHEMA=[dbo]
GO
ALTER ROLE [db_owner] ADD MEMBER [db_location]
GO
/****** Object:  Table [dbo].[TBackup]    Script Date: 5/12/2023 8:42:08 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TBackup](
	[id] [int] NULL,
	[no_rfq] [varchar](50) NULL,
	[no_wo] [varchar](50) NULL,
	[name_cust] [varchar](50) NULL,
	[qty] [varchar](50) NULL,
	[code_qr] [varchar](50) NULL,
	[locations] [varchar](50) NULL,
	[sub_locations] [varchar](50) NULL,
	[rack] [varchar](50) NULL,
	[warehouse] [varchar](50) NULL,
	[no_tag] [int] NULL,
	[name_item] [varchar](50) NULL,
	[desc_pn] [varchar](50) NULL,
	[bpid] [varchar](50) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TData]    Script Date: 5/12/2023 8:42:08 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TData](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[no_rfq] [varchar](50) NULL,
	[no_wo] [varchar](50) NULL,
	[name_cust] [varchar](50) NULL,
	[qty] [int] NULL,
	[code_qr] [varchar](50) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[warehouse] [varchar](50) NULL,
	[no_tag] [int] NULL,
	[name_item] [varchar](50) NULL,
	[desc_pn] [varchar](50) NULL,
	[bpid] [varchar](50) NULL,
 CONSTRAINT [PK_TData] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TItems]    Script Date: 5/12/2023 8:42:08 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TItems](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[no_rfq] [varchar](50) NULL,
	[no_wo] [varchar](50) NULL,
	[name_cust] [varchar](50) NULL,
	[qty] [varchar](50) NULL,
	[code_qr] [varchar](50) NULL,
	[locations] [varchar](50) NULL,
	[sub_locations] [int] NULL,
	[rack] [varchar](50) NULL,
	[warehouse] [varchar](50) NULL,
	[no_tag] [int] NULL,
	[name_item] [varchar](50) NULL,
	[desc_pn] [varchar](50) NULL,
	[bpid] [varchar](50) NULL,
	[no_sdf] [varchar](50) NULL,
	[lot_del] [int] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[name_item_receh] [varchar](50) NULL,
 CONSTRAINT [PK_Titems] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TOut]    Script Date: 5/12/2023 8:42:08 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TOut](
	[id_out] [int] IDENTITY(1,1) NOT NULL,
	[id_data] [int] NULL,
	[id_receh] [int] NULL,
	[no_rfq] [varchar](50) NULL,
	[no_wo] [varchar](50) NULL,
	[name_cust] [varchar](50) NULL,
	[name_item] [varchar](50) NULL,
	[qty] [int] NULL,
	[no_tag] [int] NULL,
	[desc_pn] [varchar](50) NULL,
	[bpid] [varchar](50) NULL,
	[warehouse] [varchar](50) NULL,
	[code_qr] [varchar](50) NULL,
	[no_sdf] [varchar](50) NULL,
	[lot_del] [varchar](50) NULL,
	[rack] [varchar](50) NULL,
	[locations] [varchar](50) NULL,
	[sub_locations] [int] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
 CONSTRAINT [PK_TOut] PRIMARY KEY CLUSTERED 
(
	[id_out] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TReceh]    Script Date: 5/12/2023 8:42:08 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TReceh](
	[id_receh] [int] IDENTITY(1,1) NOT NULL,
	[id_data] [int] NULL,
	[no_rfq_receh] [varchar](50) NULL,
	[no_wo_receh] [varchar](50) NULL,
	[name_cust_receh] [varchar](50) NULL,
	[qty_receh] [int] NULL,
	[code_qr_receh] [varchar](50) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[warehouse_receh] [varchar](50) NULL,
	[no_tag_receh] [int] NULL,
	[name_item_receh] [varchar](50) NULL,
	[desc_pn_receh] [varchar](50) NULL,
	[bpid_receh] [varchar](50) NULL,
	[locations_receh] [varchar](50) NULL,
	[sub_locations_receh] [int] NULL,
	[rack_receh] [varchar](50) NULL,
	[no_sdf_receh] [varchar](50) NULL,
	[lot_del_receh] [int] NULL,
 CONSTRAINT [PK_TReceh] PRIMARY KEY CLUSTERED 
(
	[id_receh] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[TItems] ADD  CONSTRAINT [DF_TItems_qty]  DEFAULT ((0)) FOR [qty]
GO
ALTER TABLE [dbo].[TReceh]  WITH CHECK ADD  CONSTRAINT [FK__TReceh__id_Data__43D61337] FOREIGN KEY([id_data])
REFERENCES [dbo].[TItems] ([id])
GO
ALTER TABLE [dbo].[TReceh] CHECK CONSTRAINT [FK__TReceh__id_Data__43D61337]
GO
USE [master]
GO
ALTER DATABASE [DB_LOC] SET  READ_WRITE 
GO


/* SQL PHPMYADMIN VERSION */

-- Create the database manually using phpMyAdmin.

-- Use the created database
USE DB_LOC;

-- Create the tables
CREATE TABLE TBackup (
    id INT AUTO_INCREMENT PRIMARY KEY,
    no_rfq VARCHAR(50),
    no_wo VARCHAR(50),
    name_cust VARCHAR(50),
    qty VARCHAR(50),
    code_qr VARCHAR(50),
    locations VARCHAR(50),
    sub_locations VARCHAR(50),
    rack VARCHAR(50),
    warehouse VARCHAR(50),
    no_tag INT,
    name_item VARCHAR(50),
    desc_pn VARCHAR(50),
    bpid VARCHAR(50),
    created_at DATETIME,
    updated_at DATETIME
);

CREATE TABLE TData (
    id INT AUTO_INCREMENT PRIMARY KEY,
    no_rfq VARCHAR(50),
    no_wo VARCHAR(50),
    name_cust VARCHAR(50),
    qty INT,
    code_qr VARCHAR(50),
    created_at DATETIME,
    updated_at DATETIME,
    warehouse VARCHAR(50),
    no_tag INT,
    name_item VARCHAR(50),
    desc_pn VARCHAR(50),
    bpid VARCHAR(50)
);

CREATE TABLE TItems (
    id INT AUTO_INCREMENT PRIMARY KEY,
    no_rfq VARCHAR(50),
    no_wo VARCHAR(50),
    name_cust VARCHAR(50),
    qty VARCHAR(50),
    code_qr VARCHAR(50),
    locations VARCHAR(50),
    sub_locations INT,
    rack VARCHAR(50),
    warehouse VARCHAR(50),
    no_tag INT,
    name_item VARCHAR(50),
    desc_pn VARCHAR(50),
    bpid VARCHAR(50),
    no_sdf VARCHAR(50),
    lot_del INT,
    created_at DATETIME,
    updated_at DATETIME,
    name_item_receh VARCHAR(50)
);

CREATE TABLE TOut (
    id_out INT AUTO_INCREMENT PRIMARY KEY,
    id_data INT,
    id_receh INT,
    no_rfq VARCHAR(50),
    no_wo VARCHAR(50),
    name_cust VARCHAR(50),
    name_item VARCHAR(50),
    qty INT,
    no_tag INT,
    desc_pn VARCHAR(50),
    bpid VARCHAR(50),
    warehouse VARCHAR(50),
    code_qr VARCHAR(50),
    no_sdf VARCHAR(50),
    lot_del VARCHAR(50),
    rack VARCHAR(50),
    locations VARCHAR(50),
    sub_locations INT,
    created_at DATETIME,
    updated_at DATETIME
);

CREATE TABLE TReceh (
    id_receh INT AUTO_INCREMENT PRIMARY KEY,
    id_data INT,
    no_rfq_receh VARCHAR(50),
    no_wo_receh VARCHAR(50),
    name_cust_receh VARCHAR(50),
    qty_receh INT,
    code_qr_receh VARCHAR(50),
    created_at DATETIME,
    updated_at DATETIME,
    warehouse_receh VARCHAR(50),
    no_tag_receh INT,
    name_item_receh VARCHAR(50),
    desc_pn_receh VARCHAR(50),
    bpid_receh VARCHAR(50),
    locations_receh VARCHAR(50),
    sub_locations_receh INT,
    rack_receh VARCHAR(50),
    no_sdf_receh VARCHAR(50),
    lot_del_receh INT
);
